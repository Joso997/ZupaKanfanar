<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>
<script src="{!! URL::asset('js/bootstrap.min.js')!!}"></script>
<script>
    /*window.onload = function() {
        if (window.jQuery) {
            // jQuery is loaded
            alert("Yeah!");
        } else {
            // jQuery is not loaded
            alert("Doesn't Work");
        }
    }*/
</script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script>
    if ("ontouchstart" in document.documentElement)
    {
        $(".tz-gallery .card").addClass("touch");
        $(".tz-gallery .card .card-body").css("opacity", "100");

    }
    else
    {
        /*document.write("your device is NOT a touch device");*/
    }
</script>
<script>
    var loaded_galerija = false;
    var loaded_raspored = false;
    $(document).ready(function() {

        $("#galerija-tab").on('click',function(){
            $(".tab-content > div").removeClass('active');
            $(".indigo > .nav-item > a").removeClass('active');
            $("#rest-content").addClass('d-none');
            $("#galerija").addClass('active');
            add_list();
        });
        $("ul > .nav-item > a:not(#galerija-tab)").on('click',function(e){
            $("#rest-content").removeClass('d-none');
        });
        get_raspored();
    });

    function add_list(){
        if(!loaded_galerija) {
            $.get('galerija', function (result) {
                console.log("inside");
                console.log(result);
                $.each(result.main, function (key) {
                    $('.tz-gallery > .appendable').append(
                        "<div class='col-sm-6 col-md-4'>" +
                        "<div class='card'>" +
                        "<a class='lightbox' href='slike/" + result.main[key] + "'>" +
                        "<img class='card-img rounded' src='slike/mini/" + result.main[key] + "' alt='...'/>" +
                        "</a>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'>" + result.main[key] + "</h5>" +
                        "<small class='text-muted'>Datum: 08.10.2017</small>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                    );
                });
                $.each(result.ruzareva2017, function (key) {
                    $('.tz-gallery > .appendable').append(
                        "<div class='col-sm-6 col-md-4'>" +
                        "<div class='card'>" +
                        "<a class='lightbox' href='slike/ruzareva/" + result.ruzareva2017[key] + "'>" +
                        "<img class='card-img rounded' src='slike/ruzareva/mini/" + result.ruzareva2017[key] + "' alt='...'/>" +
                        "</a>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'>" + result.ruzareva2017[key] + "</h5>" +
                        "<small class='text-muted'>Datum: 08.10.2017</small>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                    );
                });
                baguetteBox.run('.tz-gallery');
                if ("ontouchstart" in document.documentElement)
                {
                    $(".tz-gallery .appendable div .card").addClass("touch");
                    $(".tz-gallery .appendable .card-body").css("opacity", "100");

                }
                else
                {
                    /*document.write("your device is NOT a touch device");*/
                }
                loaded_galerija = true;
            });
        }
    }
</script>

<script>
    function get_raspored() {
        if(!loaded_raspored){
            $.get('raspored', function (result) {
                /*alert("yes");
                var str = result.toString();
                $("#temp_raspored").load(str.substring(31));*/
                //console.log(result);
                $("#temp_raspored").append(result).html();
                $("#raspored").empty().append(result).html();
                console.log(result);
                loaded_raspored = true;
            });
        }
    }
</script>

<script type="application/ld+json">
{
  "@context": "http://zupa-sv-silvestra-kanfanar.hr",
  "@type": "Organization",
  "url": "http://zupa-sv-silvestra-kanfanar.hr",
  "name": "Župa sv. Silvestra Kanfanar",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+385915149805",
    "contactType": "Customer service"
  }
}
</script>

<script>
    var list = [];
    class LIST_INFO {
        constructor(id, gumb) {
            this.id = id;
            this.gumb = gumb;
        }
    }
    $(document).ready(function() {

        $(".add_info").on('click',function(){
            add_info($(this));
        });

        $("#submit").on('click',function(){
            submit();
        });
    });
    function add_info(e){
        list[list.length] = new LIST_INFO(list.length+1, e);
        e.parent().parent().parent().append('<div id="'+list.length+'" class="input-group mb-3">'+
            '{!! Form::text("text", $value = null, ["class" => "form-control mjesto", "placeholder" => "text"]) !!}'+
            '<div class="input-group-append">'+
            '<button type="button" class="btn btn-primary remove_info">-</button></div></div>'+
            '<script> $(".remove_info").on("click",function(){remove_info($(this));});</' + 'script>');
        e.parent().parent().parent().parent().parent().parent().find('.info_board > .card > .card-body').append(''+
            '<input class="form-control d_info" placeholder="text" name="text" type="text" id="'+list.length+'">');

    }

    function remove_info(e){
        e.parent().parent().parent().parent().parent().parent().find('.info_board > .card > .card-body > #'+e.parent().parent().attr('id')+'').remove();
        e.parent().parent().remove();
        console.log(e.parent().parent());
    }

    function submit(){
        var mjesto = $(".mjesto");
        var info = $(".d_info");
        var datum = $(".datum");
        var tekst = "<div>";
        var _temp_mjesto = $(mjesto[0]).parent().parent();
        var y = 0;
        for(var i = 0; i < datum.length; i++){
            _temp_mjesto = $(mjesto[y]).parent().parent();
            tekst += '<div class="row p-1">' +
                '<div class="col-sm-4 small_calendar">' +
                '<div class="card">' +
                '<div class="card-body">'+
                '<h5 class="card-title">'+datum[i].textContent+'</h5>' ;
            for(var x = y; $(_temp_mjesto)[0]['attributes'][1]['value'] == $(mjesto[x]).parent().parent()[0]['attributes'][1]['value']; x++){
                tekst +=
                    '<p class="card-text"><b>'+mjesto[x].value+'</b></p>';
                if(x == mjesto.length-1)
                    break;
            }
            tekst +=   '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-sm-8 info_board">' +
                '<div class="card">' +
                '<div class="card-body">'+
                '<h5 class="card-title">Dodatne Informacije</h5>';
            for(var x = y; $(_temp_mjesto)[0]['attributes'][1]['value'] == $(mjesto[x]).parent().parent()[0]['attributes'][1]['value']; x++) {
                tekst +=
                    '<p class="card-text">' + info[x].value + '</p>';
                y++;
                if(x == mjesto.length-1)
                    break;
            }
            tekst +=
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        tekst += "</div>";
        $.get('spremiKalendar', {tekst : tekst}, function(result){
            alert(result.msg);
        });
    }
</script>