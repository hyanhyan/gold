function ShowModal(id,event) {
    // const img=document.getElementById(`slide-one-${id}`);
    // img.src=event.src;
    const modal = document.getElementById(id);
    modal.classList.toggle("is-visible");
}


$(document).ready(function () {
    // $(document).click(function(e) {
    //         $('.img-modal').removeClass('is-visible');
    //
    // });
    // $('img-modal').click(function (e){
    //     e.stopPropagation();
    //     }
    //     )
    // $('.modal-toggle').on('click', function(e) {
    //     e.preventDefault();
    //     $('.img-modal').toggleClass('is-visible');
    // });
    $('#img-slide-del').on('click', function(e) {
        $('.del-img').addClass('is-visible');
    });
    $('#all-slide-del').on('click', function(e) {
        $('.delete-img').addClass('is-visible');
    });
    $('#del-row').on('click',function (){
        $('.delete-img').addClass('is-visible');
    })
    $('#del-modal').on('click',function (){
        $('.delete-img').removeClass('is-visible')
    })
    $('#del-mod').on('click',function (){
        $('.del-img').removeClass('is-visible');
        $('.img_slider').removeClass('is-visible');
    })
    $('#all-pr').on('click',function (){
        $('#all-pr-mod').addClass('is-visible');
    })
    $('#del-modal-img').on('click',function (){
        $('.img_slider').removeClass('is-visible');
    })
    // $('.del-modal-toggle').on('click', function(e) {
    //     e.preventDefault();
    //     $('.del-img').toggleClass('is-visible');
    // });
    $('.img-request-slide').slick({
        dots: true,
        infinite: false,
        speed: 300,
        // rows: 2,
        slidesToShow: 1,
        // autoplay:true,
        slidesToScroll: 1,
        responsive: [

        ]
    });
    // $('.slider-for').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: '.slider-nav'
    // });
    // $('.slider-nav').slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     asNavFor: '.slider-for',
    //     dots: true,
    //     centerMode: true,
    //     focusOnSelect: true
    // });
    // $('..slider-nav img:not(".video_item")').on('click', function (){
    //     let eq = $(this).index();
    //     ($('.slick-dots>button').eq(eq)).trigger('click');
    // })
    $('.slider-nav img').on('click', function (){
        let eq = $(this).index();
        $(this).parent().prev().find('.slick-dots button').eq(eq).trigger('click');
    })

    $('.closing-send').each(function (el) {
        $(this).on('click', function () {
            $('.modal-div-send').css('display', 'none');
        })
        // document.querySelector('.modal-div-send').style.display="none";
    })
    $('.closing').each(function (el) {
        $(this).on('click', function () {
            $('.modal-div').css('display', 'none');
            $('.modal-backdrop').css('opacity', 0)

        })
    })
    $('.close-all').on('click', function () {
        $('.modal-all').css('display', 'none');
        $('.modal-backdrop').css('opacity', 0)

    })

    function getUrlParameter(sPageURL, sParam) {
        if (sPageURL.indexOf("youtu") === -1) {
            return false
        }
        if (sPageURL.indexOf('?') === -1) {
            return sPageURL.substring(sPageURL.lastIndexOf("/") + 1, sPageURL.length);
        }
        let params = sPageURL.split('?')[1]
        let sURLVariables = params.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            console.log(sParameterName);
            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    }

    function appendImage(self, html) {
        self.nextAll('.change-img').html(html);
    }

    $('#myTabContent .each .img-close').on('click', function (e) {
        e.preventDefault();
        let self = $(this);
        self.css('display', 'none')
        let img_id = self.attr('data-key');
        self.next(".delete-hidden").val(img_id);

        // let html = '<button class="btn btn-lg btn-warning add-img-inp">' +
        //                 '<i class="icon-download"></i>' +
        //             '</button>';
        // appendImage(self, html);
    });

    $('.img-cont').delegate('.add-img-inp', 'click', function (e) {
        console.log($(this).parent())
        $(this).next('.btn-input').trigger('click');
        e.preventDefault();
    });

    $(document).on('change', '.btn-input-3D', function (e) {
        console.log('must add size is so long!!!')
    })

    $(document).on('change', '.btn-resize', function (e) {


        if (!e.target.files && e.target.files[0]) {
            let imgs;
            console.log(e.target.files[0], this.files[0], 'iii')
            let file = e.target.files;
            console.log(file)
            imgs = new Image();
            imgs.onload = function () {
                let th_width = this.width;
                let th_height = this.height;
                let th_div = th_width / th_height;
                if (th_width > 2000 || th_width < 1300) {
                    alert('size is so long ' + th_width)
                    return 0;
                } else if (th_div >= 1.09 || th_div <= 1.01) {
                    alert('quality is pure ' + th_div)
                    return 0;
                }

                $.each(file, (i, item) => {

                    let img = $('<img id="dynamic' + i + '" >'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', URL.createObjectURL(item));
                    $(this).parent().children('div').html(img);
                    $(this).parent().children('.img-close').css('cssText', 'display: block !important');
                })


            };
            imgs.src = URL.createObjectURL(file[0]);


        }
    });

    $("#boot-search, #user-search").on("keyup", function () {
        const self = $(this)
        let value = self.val().toLowerCase();
        let allTr = self.parent().parent().nextAll('table').find('tr').not(':first');
        allTr.filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#check-user .form-check-input').on('click', function () {
        let div_td = $('#check-user-role td.' + $(this).val());
        if ($(this).is(':checked')) {
            div_td.parents('tr').show();
        } else {
            div_td.parents('tr').hide();
        }
    });

    $('#yt-input').bind("paste", function (e) {
        const ytLink = e.originalEvent.clipboardData.getData('text');
        let Key = getUrlParameter(ytLink, 'v');

        if (!!Key) {
            $('#videoURL').val(Key);

            $('#yt-iframe').attr('src', 'https://www.youtube.com/embed/' + Key);
            $('#yt-iframe').parent().find('strong').html("Video URL: <i style='color: green'>correct link</i>");
        } else {
            $('#yt-iframe').attr('src', '');
            $('#videoURL').val('');
            $('#yt-iframe').parent().find('strong').html("Video URL: <i style='color: red'>incorrect link</i>");
        }
    });

    $('#yt-input').bind("input", function (e) {
        const ytLink = e.target.value;
        let Key = getUrlParameter(ytLink, 'v');
        console.log(Key);
        if (!!Key) {
            $('#videoURL').val(Key);

            $('#yt-iframe').attr('src', 'https://www.youtube.com/embed/' + Key);
            $('#yt-iframe').parent().find('strong').html("Video URL: <i style='color: green'>correct link</i>");
        } else {
            $('#yt-iframe').attr('src', '');
            $('#videoURL').val('');
            $('#yt-iframe').parent().find('strong').html("Video URL: <i style='color: red'>incorrect link</i>");
        }

    });

    function setSelected(e, html) {
        if (html.prop('required') && !html.prop('disabled') && '0' === html.find(":selected").val()) {
            e.preventDefault();
            html.css('border', '2px solid red')
        } else {
            html.css('border', '0')
        }
    }

    $('#create-prod, #update-prod, #copy-btn').on('click', function (e) {
        const selectCategory = $('#selectCategory');
        const metal = $('#metalType');
        const forWhom = $('#forWhom select');
        const productType = $('#productType');
        const metalRate = $('#metalRate');
        setSelected(e, selectCategory);
        setSelected(e, metal);
        setSelected(e, forWhom);
        setSelected(e, productType);
        setSelected(e, metalRate);
    })


    $("#b585").on("input", function () {
        let val585 = $(this).val();
        $('#b333').val(parseFloat((val585 - val585 * 0.015) * 0.569).toFixed(2));
        $('#b375').val(parseFloat((val585 - val585 * 0.015) * 0.64).toFixed(2));
        $('#b416').val(parseFloat((val585 - val585 * 0.015) * 0.71).toFixed(2));
        $('#b750').val(parseFloat(val585 * 1.28).toFixed(2));
        $('#b875').val(parseFloat(val585 * 1.5).toFixed(2));
        $('#b916').val(parseFloat(val585 * 1.57).toFixed(2));
        $('#b958').val(parseFloat(val585 * 1.64).toFixed(2));
        $('#b900').val(parseFloat(val585 * 1.54).toFixed(2));
    });

    $("#b999").on("input", function () {
        let val999 = $(this).val();
        /* $('#b995').val(parseFloat(val999-0.6).toFixed(2));
         $('#s999').val(parseFloat(val999+0.6).toFixed(2));
         $('#s995').val(parseFloat(val999+0.3).toFixed(2));*/
    });

    $("#s999").on("input", function () {
        let val999 = $(this).val();
        $('#b999').val(parseFloat(val999 - 0.6).toFixed(2));
        $('#b995').val(parseFloat(val999 - 0.9).toFixed(2));
        $('#s995').val(parseFloat(val999 - 0.3).toFixed(2));
    });

    $("#s585").on("input", function () {
        let val585 = $(this).val();
        $('#s333').val(parseFloat((val585 - val585 * 0.015) * 0.569).toFixed(2));
        $('#s375').val(parseFloat((val585 - val585 * 0.015) * 0.64).toFixed(2));
        $('#s416').val(parseFloat((val585 - val585 * 0.015) * 0.71).toFixed(2));
        $('#s750').val(parseFloat(val585 * 1.28).toFixed(2));
        $('#s875').val(parseFloat(val585 * 1.5).toFixed(2));
        $('#s916').val(parseFloat(val585 * 1.57).toFixed(2));
        $('#s958').val(parseFloat(val585 * 1.64).toFixed(2));
        $('#s900').val(parseFloat(val585 * 1.54).toFixed(2));
    });

    $('#fake').on('change', function () {
        let allIds = $('#selectCategory, #metalType, #forWhom select, #productType, #metalRate, #inPrice, #inWeight, #inCode');
        if ($(this).is(':checked')) {
            $('.for-fake').css('display', 'none');
            allIds.removeAttr('required');
        } else {
            $('.for-fake').css('display', 'flex');
            allIds.prop('required', true);
        }
    })

//    profile img change
    $('.img-group input').on('change', function (event) {
        const imgUrl = URL.createObjectURL(event.target.files[0]);
        $(this).next('img').attr('src', imgUrl);
    });
    $('.user-img').on('click', function (e) {
        e.preventDefault();
        let self = $(this);
        let id = self.closest('tr').find('.type-select').val();
        let product_id = self.attr('data-id');
        let user_id = self.closest('tr').find('.user-info').attr('data-id');
        $.ajax({
            url: "productType",
            type: 'GET',
            data: {user_id: user_id, id: id, product_id: product_id},
            success: function (data) {
                $('.page-content').html(data)
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.type-select-all').on('change', function (e) {
        e.preventDefault();
        let self = $(this);
        let id = $(this).val();
        let user_id = self.next().attr('data-id');

        $.ajax({
            url: "selectTypeAll",
            type: 'GET',
            data: {user_id: user_id, id: id},
            success: function (data) {
                $('.all-img').empty();
                data.map((i, item) => {
                    $('.all-img').append(` <div class="change-img d-flex flex-wrap justify-content-center">
                             <img src='/uploads/products/${ Object.values(i)[0]}' id="mee" class="user-images"  width="100" height="100">
                   </div>`
                    );

                });
                $("#mee").click(function() {
                    alert(555)
                })
            },
            error: function (data) {
                console.log(data)
            }

        })
    })
    $('.type-select').on('change', function (e) {
        e.preventDefault();
        let self = $(this);
        let id = $(this).val();
        let user_id = $(this).closest('tr').find('.user-info').attr('data-id');

        $.ajax({
            url: "selectType",
            type: 'GET',
            data: {user_id: user_id, id: id},
            success: function (data) {
                Object.values(data).map((i, item) => {
                    self.closest('tr').find('.user-img').attr('src', '/uploads/products/' + data[0])
                });
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.accept').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        $.ajax({
            url : 'productAccept',
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id},
            type : 'POST',
            success : function(data){
                self.closest('tr').remove();
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.acceptOffer').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        $.ajax({
            url : '/acceptOffer',
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id},
            type : 'POST',
            success : function(data){
                self.closest('div').remove();
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.declineOffer').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        $.ajax({
            url : '/refuseOffer',
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id},
            type : 'POST',
            success : function(data){
                self.closest('div').remove();
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.del-prods').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        let to_id=$('.to_id_prods').val();
        let url = $(".del-img-form-prods").attr('action');

        let message = self.closest('div').find('.user-message_prods').val();
        $.ajax({
            url : url,
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id,message:message,to_id:to_id},
            type : 'POST',
            success : function(data){
                $(`table#test tr#${id}`).remove();
                $('.delete-img').toggleClass('is-hidden');
                $('.img-modal').toggleClass('is-hidden');
                $('.modal-backdrop').css('opacity','0 !important');
                $('.modal-backdrop').css('z-index','0 !important');
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.decline').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        let to_id=$('.to_id').val();
        let img=$('.slick-active').children('img')[0].src;
        let shortSrc = img.split('/')[5];

        if(!img) {
            var url = $(".del-img-form").attr('action');
        }
        else{
            url = $(".del-img-form").attr('data-url');
        }
        let message = self.closest('div').find('.user-message').val();
        $.ajax({
            url : url,
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id,message:message,to_id:to_id,img:shortSrc},
            type : 'POST',
            success : function(data){
                $(`table#test tr#${id}`).remove();
                $('.delete-img').toggleClass('is-hidden');
                $('.img-modal').toggleClass('is-hidden');
                $('.modal-backdrop').css('opacity','0 !important');
                $('.modal-backdrop').css('z-index','0 !important');
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.del-img-slide').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        let to_id=$('.to_id').val();
        let img=$('.slick-active').children('img')[0].src;
        let shortSrc = img.split('/')[5];
        let url = $(".delete-img-form").attr('action');
        let message = self.closest('div').find('.user-message').val();
        $.ajax({
            url : url,
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id,message:message,to_id:to_id,img:shortSrc},
            type : 'POST',
            success : function(data){
                $(`table#test tr#${id}`).remove();
                $('.del-img').toggleClass('is-visible');
                $('.img-modal').toggleClass('is-hidden');
                $('.modal-backdrop').css('opacity','0 !important');
                $('.modal-backdrop').css('z-index','0 !important');
            },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.decline').on('click', function (e){
        e.preventDefault();
        let self = $(this);
        let id=self.attr('data-id');
        let to_id=$('.to_id').val();
        let url = $(".del-img-form").attr('action');
        let message = self.closest('div').find('.user-message').val();
        $.ajax({
            url : url,
            data :  {_token: $('meta[name="csrf-token"]').attr('content'), id: id,message:message,to_id:to_id},
            type : 'POST',
            success : function(data){
                $(`table#test tr#${id}`).remove();
                $('.delete-img').toggleClass('is-visible');
                $('.img-modal').toggleClass('is-hidden');
                $('.modal-backdrop').css('opacity','0 !important');
                $('.modal-backdrop').css('z-index','0 !important');
                },
            error: function (data) {
                console.log(data)
            }
        });
    })
    $('.makeOffer-modal-toggle').on('click', function(e) {
        e.preventDefault();
        $('.makeOffer').modal('show')
    });
    $('.makeOffer_next').on('click', function (){
        $('.makeOffer_none').hide();
        $('.makeOffer_block').show();
    });
    $('.makeOffer_block').on('click', function (){
        $('.makeOffer_none').show();
        $('.makeOffer_block').hide();
    });

// Get the image and insert it inside the modal - use its "alt" text as a caption
//     var modal = document.getElementById("myModal");
//     var modalImg = document.getElementById("img01");
//         var captionText = document.getElementById("caption");
//         $('.myImg').on('click', function () {
//             modal.css('display','block');
//             modalImg.src = this.src;
//             captionText.innerHTML = this.alt;
//         })


// Get the image and insert it inside the modal - use its "alt" text as a caption
        $('.myImg-send').click(function () {
            $('.myMod').css('display', 'block');
            $('.openedImg').attr('src', this.src);
            $('.caption1').innerHTML = this.alt;
        });
        $('.closeMod').click(function () {
            $('.myMod').css('display', 'none');
            $('.modal-div-send').css('display', 'none');

        })


// Get the <span> element that closes the modal
//         var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal

        // span.onclick = function () {
        //     modal.style.display = "none";
        // }
        // $('.del-img1').click(function () {
        //     $('.modal-div-send').css('display', 'none');
        //     $('.modal-div').modal('show');
        //     $('.modal-backdrop').css('z-index', '0');
        // });
        // $('.del-img').click(function () {
        //     let src = $(this).closest('div').prev().attr('src');
        //     let shortSrc = src.split('/')[5];
        //     let a = $('#Mymodal').find('.prod-img');
        //     a.val(shortSrc);
        //     $('#Mymodal').modal('show');
        //     $('.modal-backdrop').css('z-index', '0');
        // });
        // var modall = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
//         var modalImgg = document.getElementById("img01");
//         var captionTextt = document.getElementById("caption");
//         $('.user-images').on('click', function () {
//             modall.style.display = "block";
//             modalImgg.src = this.src;
//             captionTextt.innerHTML = this.alt;
//         })
        // $('.user-images').click(function(){
        //     let src = $(this).attr('src');
        //     let shortSrc = src.split('/')[5];
        //     let a = $('#Mymodal').find('.prod-img');
        //     a.val(shortSrc);
        //     $('#Mymodal').modal('show');
        //     $('.modal-backdrop').css('z-index','0');
        // });

        // $(".del-img-form").submit(function (event) {
        //     /* stop form from submitting normally */
        //     event.preventDefault();
        //
        //     /* get the action attribute from the <form action=""> element */
        //     let form = $(this);
        //     let url = form.attr('action');
        //     let img = $('.prod-img').val();
        //     let prod_id = $('.product_id').val();
        //     let id = $('.to_id').val();
        //     let message = $('.product-message').val();
        //
        //     $.ajax({
        //         url: url,
        //         data: {
        //             _token: $('meta[name="csrf-token"]').attr('content'),
        //             id: id,
        //             img: img,
        //             product_id: prod_id,
        //             message: message
        //         },
        //         type: 'POST',
        //         success: function (data) {
        //             $('#Mymodal').modal('hide');
        //             $('.close').click();
        //             $(`table#product-table tr#${prod_id}`).remove();
        //
        //         },
        //         error: function (data) {
        //             console.log(data)
        //         }
        //     });
        // });

});
