
jQuery(document).ready(function ($) {
    // Global Variables
    let getDir = document.dir;
    let windowWidth = $(window).innerWidth();
    let isResponsive = false;

    if (windowWidth <= 992) {
        isResponsive = true;
    }
    
    // For Arabic Datatable
    let arLang;

    if (getDir) {
        arLang = {
            lengthMenu: "عرض _MENU_ مدخلات في كل صفحة",
            zeroRecords: "لايوجد شيء - عذراً",
            info: "اظهار صفحة _PAGE_ من _PAGES_",
            infoEmpty: "لايوجد شيء",
            infoFiltered: "(تمت تصفيته من _MAX_ إجمالي السجلات)",
            search: "بحث عن: ",
            zeroRecords: "لم يتم العثور على سجلات مطابقة",
        };
    }

    // Vacancies DataTable
    let vacanciesTable = $('#vacancies-table');

    if (vacanciesTable.length > 0) {
        let vacanciesDatatable = vacanciesTable.DataTable({
            "dom": 'rtip',
            "paging": true,
            "pageLength": 10,
            "searching": true,
            "scrollX": true,

            responsive: isResponsive,

            "language": {
                ...arLang,
                paginate: {
                    "next": "<div>Next</div>",
                    "previous": "<div>Prev</div>"
                }
            }
        });

        setTimeout(() => {
            vacanciesDatatable.columns.adjust();
        }, 500);

        // Custom Search
        $('.custom-datatable-search').keyup(function(){
            vacanciesDatatable.search($(this).val()).draw();
        });
    }
});