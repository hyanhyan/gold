$(document).ready(function (){
    $('#metalType option').hide();
    $('#metalType option:first-child').show();

    showHidden("metalType",1,false);
    showHidden("metalType",2,false);

    let selectCategory = $("#selectCategory");
    selectCategory.change(function() {
        // $('#forWhom select option:first-child').show();
        let selectedCategory = $('#selectCategory option:selected').val();

        $('#productType option').hide();
        $(`#productType option[typeCategory=${selectedCategory}]`).show();

        $('.req-span').css('display', 'none');

        const dType = $('#d-type #productType');
        dType.prop('disabled', true);
        dType.attr('name', 'product_types');
        $('#forWhom select option:first-child').prop('selected',true);


        $('#d-gear').css('display', 'none');
        $('#d-gear #productGear').attr('name', 'product_types');
        $('#d-gear #productGear').prop('required',false);
        // $('#w-belt').css('display', 'none');
        console.log($('#w-belt').parent('div'));
        if(selectedCategory==='1' ){

            $('#w-belt').parent('div').css('display', 'none');

            $('#d-type').css('display', 'block');
            // $('#rateDiv').css('display', 'block');


            $('#metalType').prop('disabled', false);

            // $('#forWhom select').prop('disabled', false);
            // $('#forWhom .req-span, #metalTypeDiv .req-span').css('display', 'inline');
            // showHidden("metalType",1,false);
            // showHidden("metalType",2,false);

        } else if (selectedCategory === '2'){
            const dType = $('#productType');
            dType.prop('disabled', false);
            dType.attr('name', 'prod[product_type_id]');
            dType.prop('required',true);

            $('#metalType').prop('disabled', 'disabled');
            $('#metalRate').prop('disabled', 'disabled');
            $("#metalType").val($("#metalType option[value='0']").val());
            $("#metalRate").val($("#metalRate option[value='0']").val());

            $('#forWhom select ').prop('disabled', 'disabled');

            let showType= $("#productType option[value='0']");
            showType.show();
            $("#productType").val(showType.val())

            let forWhomType= $("#forWhom select option[value='0']");
            forWhomType.show();
            $("#forWhom select").val(forWhomType.val());

            $('#d-type .req-span').css('display', 'inline');


        }else if (selectedCategory === '4'){
            // $('#d-type #productType').prop('disabled', true);
            $('#d-type').css('display', 'none');

            // $('#rateDiv #metalRate').prop('disabled',true);
            // $('#rateDiv').css('display', 'none');

            $('#d-gear').css('display', 'block');
            $('#d-gear #productGear').attr('name', 'prod[product_type_id]');
            $('#productGear').prop('required',true);

            // $('#w-belt').css('display', 'block');
            $('#w-belt').parent('div').css('display', 'block');


            $('#d-gear select>option:not(:first-child)').css('display', 'none');
            $('#d-gear select>option[typecategory="4"]').css('display', 'block');
        }else {
            $('#d-type').css('display', 'block');
            // $('#rateDiv').css('display', 'block');
        }

        // item.show();

        //showMetalType();

        $('#productType option:not([disabled]):first').prop('selected',true);
    });

    function hideSilver(){
        $('#productType>option[value="2"], #productType>option[value="9"], #productType>option[value="10"], #productType>option[value="11"], #productType>option[value="12"]').hide();
    }

    $("#metalType").change(function() {
        let selectedMetalType = $(this).children("option:selected").val();
        $('#metalRate').prop('disabled',false);

        let itemRateNF = $('#metalRate option:not(:first-child)');
        let itemRate = $('#metalRate option');
        itemRate.hide();
        itemRateNF.show();

        $('#rateDiv .req-span').css('display', 'inline');

        if(selectedMetalType==='1'){

            $('#productType>option[value="2"], #productType>option[value="9"], #productType>option[value="10"], #productType>option[value="11"], #productType>option[value="12"]').show();

            itemRate.prop('disabled',false);
            itemRate.show();

            showHidden("metalRate",12,true);
            showHidden("metalRate",13,true);
            showHidden("metalRate",14,true);
            showHidden("metalRate",15,true);
        } else  {


            hideSilver();


            itemRateNF.prop('disabled',true);
            itemRateNF.hide();
            showHidden("metalRate",12,false);
            showHidden("metalRate",13,false);
        }

        $('#metalRate option:first-child').prop('selected',true);
    });

    function showHidden(fooName, id, status){
        let itemRate = $(`#${fooName} option[value=${id}]`);
        itemRate.prop('disabled',status);
        if (status) {
            itemRate.hide();
        } else {
            itemRate.show();
        }
    }

    $('#forWhom select').on('change', function (){
        if($('#selectCategory option:selected').val() !== '1') return ;

        const sOption = $(this).children('option:selected').val();
        const dType = $('#d-type #productType');
        if ('0' === $('#forWhom option:selected').val()) {
            dType.prop('disabled', true);
            dType.attr('name', 'prod[product_types]');
            dType.prop('required',false);
        } else {
            dType.prop('disabled', false);
            dType.attr('name', 'prod[product_type_id]');
            dType.prop('required',true);
        }
        $("#productType option").hide();

        $('#d-type .req-span').css('display', 'inline');

        switch(sOption){
            case "2":
                // let ors = $("[forwhom*='7'],[forwhom*='3']");
                $("[forwhom*='7'],[forwhom*='3']").show();
                $(`#productType option[typeCategory!='1']`).hide();
                break;
            case "3":
                $("[forwhom='7'],[forwhom='5']").show();
                $(`#productType option[typeCategory!='1']`).hide();
                break;
            case "1":
            default :
                $("#productType option[typeCategory='1']").show();

        }

        if('2' === $('#metalType option:selected').val()){
            hideSilver()
        }

    });




});
