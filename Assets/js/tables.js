const tabla = document.querySelector("#tabla")
const dataTable = new DataTable(tabla, {
    perPage: 4,
    perPageSelect: [4, 6, 9, 12],
    labels: {
        placeholder: "Buscando..",
        perPage: "{select}",
        noRows: "No se encontraron registros",
    }
});