$(function (){
    // filter
    $(".filter-item").click(function (event){
        let $this = $(this)
        $('body .filter-item__title').removeClass('active showing')
        $("body .filter-show").hide();

        if ($this.hasClass('isShowing')) {
            $this.removeClass('isShowing')
            $this.find('.filter-item__title').removeClass('active showing')
            $this.find(".filter-show").hide();
        }else {
            $this.find('.filter-item__title').addClass('active showing')
            $this.addClass('isShowing')
            $this.find(".filter-show").show();
        }
    })

    $("body").on("click",".js-load-search", function (event){
        event.preventDefault()
        let $this = $(this)
        $("body .js-load-search").removeClass('active check')
        $this.addClass('active check')
        let URL = $this.attr('href')
        let dataValue = $this.attr('data-value')
        if (URL) {
            $.ajax({
                url : URL,
                method : "GET",
                async : false,
                beforeSend: function (xhr) {
                    $(".js-box-products").html(`<div class="loadings"></div>`)
                },
                success : function(results)
                {
                    history.pushState({}, '', results.url_full)
                    setTimeout(function (){
                        if(dataValue)
                        {
                            $this.parents('.filter-item').find('.filter-item-value').text(dataValue)
                        }
                        $(".js-box-products").html(results.html)
                    },1000);
                }
            });
        }
    })

    $('body').on("click",".btn-filter-close", function (event){
        event.preventDefault()
        let $this = $(this)
        let value = $this.attr('data-value')
        if (value) {
            $this.parents('.filter-item').find('.filter-item-value').text(value)
        }
    })
})
