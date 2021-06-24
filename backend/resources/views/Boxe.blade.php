<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="boxe_container">
@foreach($boxe as $b)
<div class="boxa">
<img src="img/spalatorie.png" class="boxaimg" alt="" />
        <div  class="subcol" style="background-color:#ff0000;">  
            <h2>{{$b->nume_boxa}}</h2>
            <div>
            <select id="statuscss" class="statuscss" name="status">
            <option> Selecteaza Status Boxa</option>
            <option value="1">Boxa Disponibila</option>
            <option value="0">Boxa Ocupata</option>
            </select>
            <select id="timercss" class="timercss" name="timer">
            <option> Selecteaza Timer</option>
            <option value="15">15 Min</option>
            <option value="45">45 Min</option>
            </select>
            <button id="seteaza_status" data-id="{{$b->id}}" class="btn btn-info">Seteaza Boxa</button>
            </div>
        </div>

</div>
@endforeach

</div>

<style>


.boxa {
    -webkit-box-flex:1;
    -moz-box-flex:1;
    flex:1;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction:column;
    align-items:stretch;
    margin-right:3%;
}


.boxe_container {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction:row;
    padding: 10% 10% 10% 10%;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}

.subcol{
   -webkit-box-flex:1;
   -moz-box-flex:1;
   flex:1 auto;
   margin-top:-1%;

   -webkit-border-bottom-right-radius: 15px;
    -webkit-border-bottom-left-radius: 15px;
    -moz-border-radius-bottomright: 15px;
    -moz-border-radius-bottomleft: 15px;
    border-bottom-right-radius: 15px;
    border-bottom-left-radius: 15px;
}


.subcol h2{
    text-align:center;
    color:#ffffff;
    padding: 10% 10% 0 10%;
    font-weight:200;
    font-size:2.2em;
    line-height:1;
    text-transform:uppercase;
    margin-bottom:13%;
}

.subcol p{
    text-align:center;
    padding: 0 10% 10% 10%;
    margin-top:-1.2%;
    color:#ffffff;
    font-size:0.9em;
}

.boxaimg {
    width:100%;
    max-height:400px;
}
</style>

<script type="text/javascript">

$( document ).ready(function() {
    $('[id="seteaza_status"]').on( "click", function() {
       var status = $(event.target).closest('.subcol').find('.statuscss').val();
       var timer = $(event.target).closest('.subcol').find('.timercss').val();
       var idboxa = $(this).attr('data-id');
       $.ajax({
            type: 'POST',
            url: '/api/boxa',
            data: {"status": status,"timer" : timer,"idboxa" : idboxa, "_token": "{{ csrf_token() }}"},
            success: function (data) {
                console.log(data);
            }
        });
    });
});

</script>