
onChange='Choix(this.form)'

<div><label>Numero chambre</label>
    <select type="text" name="Numero_chambre" id="Numero_chambre" class="form-control">
      <option>---Choisisez un Numero--</option>
      <option></option>
      <option></option>
      <option></option>
    </select>
</div>

<script type="text/javascript">
function Choix(form) {
i = form.Type_chambre.selectedIndex;

switch (i) {
case 1 : var txt = new Array ('1U','2U','3U');break;
case 2 : var txt = new Array ('1D','2D','3D');break;
case 3 : var txt = new Array ('1L','2L','3L');break;
}

for (i=0;i<3;i++) {
form.Numero_chambre.options[i+1].text=txt[i];
}
}
</script>
