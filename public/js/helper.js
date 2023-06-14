function selectCombobox(id,url){
    $('#'+id).select2({
      ajax: {
        url: window.location.origin + url,
        data: function (data) { 
            return {
              term : data.term
            };
        },
        processResults: function (data) { 
            return {
                results: $.map(data, function(obj) { 
                    return { id: obj.id, text: obj.value };
                })
            };
        },
        cache: true
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      }
    });
}