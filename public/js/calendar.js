document.addEventListener('DOMContentLoaded', function () {
    const today = new Date();

    for (let i = 0; i < 3; i++) {
        const date = new Date(today.getFullYear(), today.getMonth() + i, 1);
        renderCalendar(date, `calendar-${i}`);
    }

    function renderCalendar(date, elementId) {
        const container = document.getElementById(elementId);
        container.innerHTML = '';

        const year = date.getFullYear();
        const month = date.getMonth();
        const monthName = date.toLocaleString('default', { month: 'long' });

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const title = document.createElement('h5');
        title.className = 'text-capitalize mb-2';
        title.innerText = `${monthName} ${year}`;
        container.appendChild(title);

        const table = document.createElement('table');
        table.className = 'calendar-table table table-bordered';

        const thead = document.createElement('thead');
        thead.innerHTML = `<tr>
            <th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th>
        </tr>`;
        table.appendChild(thead);

        const tbody = document.createElement('tbody');
        let row = document.createElement('tr');

        let dayOffset = (firstDay + 6) % 7; // Понедельник — первый день
        for (let i = 0; i < dayOffset; i++) {
            row.appendChild(document.createElement('td'));
        }

        for (let day = 1; day <= lastDate; day++) {
            const td = document.createElement('td');
            td.innerText = day;

            const currentDate = new Date(year, month, day);
            const weekday = currentDate.getDay(); // 0 - воскресенье, 6 - суббота

            if (weekday === 0) td.classList.add('sunday');
            if (weekday === 6) td.classList.add('saturday');

            const isToday =
                day === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear();

            if (isToday) td.classList.add('today');

            row.appendChild(td);

            if ((day + dayOffset) % 7 === 0) {
                tbody.appendChild(row);
                row = document.createElement('tr');
            }
        }

        if (row.children.length > 0) tbody.appendChild(row);
        table.appendChild(tbody);
        container.appendChild(table);
    }
});
