<x-filament-panels::page>
    <div id="calendar"></div>

    <div style="margin-top: 2rem; padding: 1rem; background-color: #1f2937; border-radius: 0.5rem; color: white;">
        <h2 style="font-size: 1.25rem; margin-bottom: 1rem;">Interactions:</h2>
        <ul style="display: flex; flex-wrap: wrap; gap: 1.5rem; list-style: none; padding: 0; margin: 0;">
            <li><span style="display: inline-block; width: 12px; height: 12px; background-color: #3b82f6; border-radius: 50%; margin-right: 0.5rem;"></span> Meeting</li>
            <li><span style="display: inline-block; width: 12px; height: 12px; background-color: #f97316; border-radius: 50%; margin-right: 0.5rem;"></span> Call</li>
            <li><span style="display: inline-block; width: 12px; height: 12px; background-color: #22c55e; border-radius: 50%; margin-right: 0.5rem;"></span> Email</li>
            <li><span style="display: inline-block; width: 12px; height: 12px; background-color: #facc15; border-radius: 50%; margin-right: 0.5rem;"></span> Note</li>
            <li><span style="display: inline-block; width: 12px; height: 12px; background-color: #6b7280; border-radius: 50%; margin-right: 0.5rem;"></span> Other</li>
        </ul>
    </div>

    @vite(['resources/js/calendar.js'])
</x-filament-panels::page>

