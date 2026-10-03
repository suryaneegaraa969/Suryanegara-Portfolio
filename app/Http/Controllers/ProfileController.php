<?php
// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\PortfolioProject;
use App\Models\ProfileData;
use App\Models\SkillItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profile        = ProfileData::first();
        $projects       = PortfolioProject::orderBy('sort_order')->get();
        $featured       = PortfolioProject::where('is_featured', true)->first();
        $skills         = SkillItem::orderBy('sort_order')->get();
        $certifications = Certification::orderBy('sort_order')->get();

        $seo = [
            'title' => ($profile->name ?? 'Ahmad Barroq Suryanegara') . ' — Data Analyst Portfolio',
            'description' => $profile->short_bio ?? 'Data Analyst portfolio showcasing projects, skills, and certifications in data analytics, Python, Tableau, and web development.',
            'image' => asset($profile->profile_image ?? 'images/profile.jpg'),
            'url' => url('/'),
        ];

        return view('home', compact('profile', 'projects', 'featured', 'skills', 'certifications', 'seo'));
    }

    public function showProject(PortfolioProject $project): View
    {
        $project->load('images');
        $otherProjects = PortfolioProject::where('id', '!=', $project->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        $seo = [
            'title' => $project->title . ' — Ahmad Barroq Suryanegara',
            'description' => $project->description,
            'image' => asset($project->image),
            'url' => route('portfolio.show', $project->slug),
        ];

        return view('projects.show', compact('project', 'otherProjects', 'seo'));
    }

    public function showCertification(Certification $certification): View
    {
        $otherCertifications = Certification::where('id', '!=', $certification->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        $seo = [
            'title' => $certification->title . ' — Ahmad Barroq Suryanegara',
            'description' => $certification->description,
            'image' => asset('images/profile.jpg'),
            'url' => route('certification.show', $certification->slug),
        ];

        return view('certifications.show', compact('certification', 'otherCertifications', 'seo'));
    }

    public function storeMessage(Request $request): JsonResponse|RedirectResponse
    {
        // Honeypot check - if 'website' field is filled, it's likely a bot
        if ($request->filled('website')) {
            // Pretend success but don't actually process
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Your message has been sent.']);
            }
            return back()->with('success', 'Your message has been sent. Thank you!');
        }

        $validated = $request->validate([
            'sender_name'  => 'required|string|max:255',
            'sender_email' => 'required|email:rfc,dns|max:255',
            'subject'      => 'nullable|string|max:255',
            'message'      => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        try {
            Mail::to(env('MAIL_RECEIVER_ADDRESS', 'ahmadbarroq123@gmail.com'))
                ->send(new ContactFormMail(
                    senderName: $validated['sender_name'],
                    senderEmail: $validated['sender_email'],
                    contactSubject: $validated['subject'] ?? 'No Subject',
                    messageContent: $validated['message'],
                ));
        } catch (\Exception $e) {
            report($e);
        }

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Your message has been sent.']);
        }

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}