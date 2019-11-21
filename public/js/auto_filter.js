/* Adds in a text-filter for any tables on a page                */
/* Will skip filters on blank <th> entries                       */
/* Does not work with paginated tables or multiple tables        */
/* Adding class="auto-filter-none" to <TH> will skip that column */
/* Tables must follow the following format:                      */
/*
    <table class="auto-filter">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>

////////////////////////////////////////////////////
<script src="{{ asset('/js/auto_filter.js') }}"></script>
*/

$(document).ready(function() {
    //Get all page tables
    tables = $(".auto-filter");

    //Get all header names
    columnNames = []
    columns = tables.find('thead tr:first th').each(function() {
        //Ignore empty headers
        if($(this).text() != '' && !$(this).hasClass('auto-filter-none'))
        {
            columnNames.push($(this).text());
        }
        else
        {
            columnNames.push('auto-filter-none');
        }
    });

    //Add in filter row with text inputs
    tables.children('thead').append(`<tr></tr>`);
    columnNames.forEach(function(element){
        if(element != 'auto-filter-none')
        {
            tables.find('thead tr:last').append(`
                <th>
                    <div class="input-group">
                        <input type="search" name="`+ element +`" class="col form-control form-control-sm filter" placeholder="Filter..." />
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-dark" type="button" onclick="document.getElementsByName('`+ element +`')[0].value='';autoFilter()"><i class="fas fa-times"></i></button >
                        </div>
                    </div>
                </th>
            `);
        }
        else
        {
            tables.find('thead tr:last').append(`<th></th>`);
        }
    });

    //On filter input change, filter that column (non-case-sensitive)
    $(".filter").keyup(function() {
        autoFilter(); 
    });
});

function autoFilter() {
    tables = $(".auto-filter");      

    //Find text matches for each row
    tables.children('tbody').children('tr').each(function() {   
        row = $(this);  
        match = false;              

        //Check each filter for a match
        $(".filter").each(function(index) {
            filterName = $(this).attr("name");
            columnPosition = columnNames.indexOf(filterName);
            filter = $("input[name='"+ filterName +"']").val(); 

            //This is what will be matched with the filter
            matchingValue = row.children().eq(columnPosition).text().toLowerCase();

            //Ignore blank filters
            if(filter != "")
            {
                if(matchingValue.indexOf(filter.toLowerCase()) != -1)
                {
                    match = true;
                }    
                else
                {
                    match = false;
                    return false;
                }          
            }                
            else
            {
                //Auto-match blank filters
                match = true;
            }
        });

        if(match)
        {
            $(this).show();
        }
        else
        {
            $(this).hide();
        }  
    });
}

