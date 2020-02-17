<script type="text/javascript">
function calculer()
{
var Date_arriver=document.forms['form1'].elements['Date_arriver'].value
var Date_depart=document.forms['form1'].elements['Date_depart'].value

var debut = Date.parse(Date_arriver);
var fin = Date.parse(Date_depart);
var nbjour = (fin - debut) / (1000 * 60 * 60 * 24); // + " jours";
document.forms['form1'].elements['jour'].value=nbjour;
}
</script>
<script type="text/javascript">
$(function() {
$("#Type_chambre").change(
  function(){
    $('#infos').modal('show');
    let typeChambre=$(this).val();
    $.ajax({
              method: "POST",
              url: "{{route('bedroomajax') }}",
              data: { Type_chambre: typeChambre,"_token": "{{ csrf_token() }}", },
              success:function(data)
              {
                console.log(data)

                var nbjour= $("#jour").val();
                var Nombre_chambre= $("#Nombre_chambre").val();
                var prix=data.prix*nbjour*Nombre_chambre;
                $("#Montant_payer").val(prix);
                $("#Description").val(data.description);
                    $('.modal').modal('hide');
              },
              error:function(ex,errorMsg,err)
              {
                console.log(errorMsg)
              }
            })
})
});
</script>


<style>
.loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid #cd866c;
  border-bottom: 10px solid #cd866c;
  width: 40px;
  height: 40px;
  margin: auto;

  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;

}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<style>
.modal {
  display: none;
  position: fixed;
  padding-top: 100px; }
</style>
