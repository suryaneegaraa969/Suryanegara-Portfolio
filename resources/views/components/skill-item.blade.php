{{-- resources/views/components/skill-item.blade.php --}}
@props(['skill'])

<div>
    <div class="flex justify-between mb-1">
        <span class="text-sm font-medium text-neutral-800">{{ $skill->name }}</span>
        <span class="text-sm text-neutral-500">{{ $skill->level }}%</span>
    </div>
    <div class="w-full bg-neutral-200 rounded-full h-2">
        <div class="h-2 rounded-full bg-accent" style="width: {{ $skill->level }}%;"></div>
    </div>
</div>