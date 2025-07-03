import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new Calendar(calendarEl, {
        plugins: [ dayGridPlugin, interactionPlugin ],
        initialView: 'dayGridMonth',
        events: '/admin/calendar/events',
        height: 'auto',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        eventClick: function(info){
            const id = info.event.id;

            if(id){
                window.location.href = `/admin/interactions/${id}/edit`;
            }
        }
    });

    calendar.render();
});

const typeColors = {
    email: '#22c55e',
    note: '#facc15',
    call: '#f97316',
    meeting: '#3b82f6',
    other: '#6b7280',
};

events.push({
    title: contactName + ': ' + summary,
    start: date,
    color: typeColors[type] || '#6b7280',
});

