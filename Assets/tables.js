//Buscador de tabla
const search = document.querySelector('.input-search input'),
table_rows = document.querySelectorAll('tbody tr');

search.addEventListener('input', searchTable);

function searchTable() {
const searchValue = search.value.trim().toLowerCase(); 

table_rows.forEach((row, i) => {
    let table_data = row.textContent.toLowerCase(); 


    row.classList.toggle('hide', !table_data.includes(searchValue));
    row.style.setProperty('--delay', i / 25 + 's');
});

document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
    visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
});
}