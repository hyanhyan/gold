// showMetalType();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



// Initialise the second table specifying a dragClass and an onDrop function that will display an alert
$("#product-table").tableDnD({
    onDragClass: "myDragClass",
    onDrop: function(table, row) {
        console.log(table.tBodies[0]);
        var rows = table.tBodies[0].rows;
        var debugStr = "Row dropped was "+row.id+". New order: ";

        let orderList = [];

        for (let i=0; i<rows.length; i++) {
            orderList.push(rows[i].id);
        }
        console.log(orderList);

        let prodOrdPath = $('#prodOrdPath').val();

        $.ajax({
            type: 'POST',
            url: prodOrdPath,
            data: {orderList},
            success: function(data){
                console.log(data.success);
            },
            error: function (data) {
                console.log(data)
            }
        });

        console.log(debugStr, 'debugStr');
    },
    // onDragStart: function(table, row) {
    //  //   console.log("Started dragging row "+row.id);
    // }
});
