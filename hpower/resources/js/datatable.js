// datatables.js
document.addEventListener('DOMContentLoaded', function () {
    const datatablesSimple = document.getElementById('#datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
