$( "#searchFilter" ).click(function() {
      var fieldFilter = $('#fieldFilter option:selected').text(),
      groupFilter = $('#groupFilter option:selected').text(),
      ampFilter = $('#ampFilter option:selected').text();
       $('#fieldBtn').attr('value', fieldFilter);
       $('#groupBtn').attr('value', groupFilter);
       $('#ampBtn').attr('value', ampBtn);
    });
