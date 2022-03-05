$(document).ready(function (){

    let startFlag=1;
    console.log($(".no-records-found").length);
    if($('#t-body tr').length>0 || $(".no-records-found").length!=0){
        $('#table').bootstrapTable();
        startFlag=0;
    }

    //$('#table').bootstrapTable();
    $('#add-stone').on('click', function (){
        if ($(".no-records-found")!=null) {
            if (startFlag) {
                $(".no-records-found").remove();
            }
        }
        let trCopy = $('#t-body tr');
        if (trCopy.length===0){
            $(".col-stone tr").clone().appendTo("#t-body");
            if (startFlag){
                $('#table').bootstrapTable();
            }
        } else {
            $('#t-body tr').first().clone().appendTo("#t-body");
        }
    });

    $('table').delegate('.remove-attr', 'click', function (){
        if ($('#t-body tr').length==1) {
            $(".col-stone tbody tr").remove();
            $("#t-body tr").clone().appendTo(".col-stone tbody");
        }
       $(this).parents('tr').remove();
    });
});
