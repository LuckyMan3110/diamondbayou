<div class="inner"> 
  <!--\\\\\\\ inner start \\\\\\-->
  <div class="contentpanel">
      <!-- main menu start -->
        <div><?php echo admin_main_menu_list(); //// admin_mainmenu helper ?></div>
        <!-- main menu end -->
    <style type="text/css">
    .options {
    margin-left: 300px;
    }
    </style>
    <div class="options">
      <p>
        <?php if(isset($status)) echo $status?>
      </p>
      <form id="form1" name="form1" method="post" action="<?php echo config_item('base_url') ?>admin/catamanager">
        <label for="stullercatagory">Stuller : </label>
        <select name="stullercatagory2" id="stullercatagory2">
          <option value=''>----------</option>
          <option value="Rings">Rings</option>
          <option value="Earrings">Earrings</option>
          <option value="Bracelets">Bracelets</option>
          <option value="Necklaces">Necklaces</option>
          <option value="Watches">Watches</option>
          <option value="Clearnace">Clearnace</option>
        </select>
        <select name="stullercatagory" id="stullercatagory">
        </select>
        <select name="stullersta" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="<?php echo config_item('base_url') ?>admin/catamanager">
        <label for="qualitycatagory">Quality : </label>
        <select name="qualitycatagory2" id="qualitycatagory2">
          <option value=''>----------</option>
          <option value="Rings">Rings</option>
          <option value="Earrings">Earrings</option>
          <option value="Bracelets">Bracelets</option>
          <option value="Necklaces">Necklaces</option>
          <option value="Mens">Mens</option>
          <option value="Watches">Watches</option>
          <option value="Clearnace">Clearnace</option>
        </select>
        <select name="qualitycatagory" id="qualitycatagory">
        </select>
        <select name="qualitysta" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
      <form id="form3" name="form3" method="post" action="<?php echo config_item('base_url') ?>admin/catamanager">
        <label for="uniquecatagory">Unique : </label>
        <select name="uniquecatagory" id="uniquecatagory">
          <?php foreach($unique as $ui){ ?>
          <option value="<?php echo $ui['id'] ?>"><?php echo $ui['catname'] ?></option>
          <?php } ?>
        </select>
        <select name="uniquesta" id="stuller">
          <option value="enable">Enable</option>
          <option value="disable">Disable</option>
        </select>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </form>
      <p>&nbsp;</p>
    </div>
    <script>
    function stullOptions()
    {
    var stullselection = document.getElementById('stullercatagory2').value;
    if(stullselection == 'Rings'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Wedding Bands'>Wedding Bands</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Engagement And Anniversary'>Engagement And Anniversary</option><option value='Metal Fashion'>Metal Fashion</option><option value='Mountings'>Mountings</option>";
    }
    else if(stullselection == 'Necklaces'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Diamond Fashion'>Diamond Fashion</option><option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Metal Fashion'>Metal Fashion</option><option value='Mountings'>Mountings</option>";
    }
    else if(stullselection == 'Bracelets'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option><option value='Diamond Fashion'>Diamond Fashion</option>";
    }
    else if(stullselection == 'Clearnace'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Wedding Bands'>Wedding Bands</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option><option value='Engagement And Anniversary'>Engagement And Anniversary</option><option value='Findings'>Findings</option><option value='Fabricated Metals'>Fabricated Metals</option><option value='Functional Drivers'>Functional Drivers</option>";
    }
    else if(stullselection == 'Earrings'){
    document.getElementById('stullercatagory').innerHTML = "<option value='Gemstone Fashion'>Gemstone Fashion</option><option value='Diamond Fashion'>Diamond Fashion</option><option value='Mountings'>Mountings</option><option value='Metal Fashion'>Metal Fashion</option>";
    }
    else{
    document.getElementById('stullercatagory').innerHTML = "";
    }
    }
    
    function quaOptions()
    {
    var stullselection = document.getElementById('qualitycatagory2').value;
    if(stullselection == 'Rings'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k Rose Gold'>14k Rose Gold</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Necklaces'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Bracelets'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k White Gold'>14k White Gold</option><option value='14k Two-tone'>14k Two-tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Earrings'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='14k Yellow Gold'>14k Yellow Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k Rose Gold'>14k Rose Gold</option><option value='14k White Gold'>14k White Gold</option><option value='14k Silver Two-Tone'>14k Silver Two-Tone</option><option value='14k/Silver Two-Tone'>14k/Silver Two-Tone</option>";
    }
    else if(stullselection == 'Mens'){
    document.getElementById('qualitycatagory').innerHTML = "<option value='Sterling Silver'>Sterling Silver</option><option value='clearnace'>clearnace</option><option value='Rings'>Rings</option><option value='Earrings'>Earrings</option><option value='Pendants'>Pendants</option><option value='Necklaces'>Necklaces</option><option value='Braclets'>Braclets</option>";
    }
    else{
    document.getElementById('qualitycatagory').innerHTML = "";
    }
    }
    
    function init()
    {
    var stullselection = document.getElementById('stullercatagory2');
    stullselection.onchange = stullOptions;
    var quaselection = document.getElementById('qualitycatagory2');
    quaselection.onchange = quaOptions;
    }
    window.onload = init;
    </script> 
  </div>
  <!--\\\\\\\ inner end\\\\\\--> 
</div>
<!--\\\\\\\ wrapper end\\\\\\--> 
<!-- Modal -->
<?php echo popupsOtherBlockData(); ?>