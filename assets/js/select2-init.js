(function ($) {
    // init select2
    $(document).ready(function () {
        // Init select2
        $('.select-categories').select2({
            minimumInputLength: 3,
            cache: true,

            dir: 'ltr',
            ajax: {
                url: ajaxurl,
                type: 'POST',
                // dataType: 'json',
                data: function (term) {
                    return {
                        action: 'get_events_categories',
                        term: term.term,
                    };
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    console.log(data);
                    return {
                        results: data.Result
                    };
                }
            },
        });
    });
}(jQuery));