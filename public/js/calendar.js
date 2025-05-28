document.addEventListener('DOMContentLoaded', function () {
    const today = new Date();

    for (let i = 0; i < 3; i++) {
        const target = document.getElementById(`calendar-${i}`);
        if (target) {
            const monthDate = new Date(today.getFullYear(), today.getMonth() + i, 1);
            renderCalendar(target, monthDate);
        }
    }
});

function renderCalendar(container, date) {
    container.innerHTML = '';

    const year = date.getFullYear();
    const month = date.getMonth();

    // Формируем заголовок "Месяц Год" без "г."
    const monthName = date.toLocaleString('ru-RU', { month: 'long' });
    const title = document.createElement('h5');
    title.className = 'text-center mb-2 text-capitalize';
    title.textContent = `${monthName} ${year}`; // без "г."
    container.appendChild(title);

    // Сетка дней недели
    const daysOfWeek = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
    const daysRow = document.createElement('div');
    daysRow.className = 'd-flex flex-wrap text-center fw-bold';
    daysOfWeek.forEach(day => {
        const cell = document.createElement('div');
        cell.className = 'calendar-cell small text-muted';
        cell.textContent = day;
        daysRow.appendChild(cell);
    });
    container.appendChild(daysRow);

    // Первый день недели (понедельник=0 для нашей логики)
    const firstDay = (new Date(year, month, 1).getDay() + 6) % 7;
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const grid = document.createElement('div');
    grid.className = 'd-flex flex-wrap';

    // Пустые ячейки перед первым днём месяца
    for (let i = 0; i < firstDay; i++) {
        const empty = document.createElement('div');
        empty.className = 'calendar-cell';
        grid.appendChild(empty);
    }

    // Дни месяца
    for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement('div');
        cell.className = 'calendar-cell calendar-day text-center p-1';
        cell.textContent = day;

        // Красим выходные (сб=5, вс=6, если понедельник=0)
        const dayOfWeek = (new Date(year, month, day).getDay() + 6) % 7;
        if (dayOfWeek >= 5) {
            cell.style.color = 'red';
        }

        // Белый фон ячеек (можно добавить сюда, если не сделаешь в CSS)
        cell.style.backgroundColor = '#ffffff';

        // Дата в ISO для модалки
        const isoDate = new Date(year, month, day).toISOString().split('T')[0];
        cell.dataset.date = isoDate;

        cell.addEventListener('click', () => {
            document.getElementById('note-date').value = isoDate;
            const modal = new bootstrap.Modal(document.getElementById('noteModal'));
            modal.show();
        });

        grid.appendChild(cell);
    }

    container.appendChild(grid);
}
