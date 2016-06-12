<?php
/*
Plugin Name: WCTRS Custom Member Profile
Description: This plugin allows custom member fields (meta data) to be displayed and updated on profiles.php
Version: 1.0
Author: Ben Broadbent
License: GPLv2
*/


/*
 * Adding custom user fields...
 * See.... http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
 */

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );


function my_show_extra_profile_fields( $user ) { 
?>

<h3>Extra profile information</h3>
<table class="form-table">

    <tr>
        <th><label for="title">Title</label></th>
        <td><input type="text" name="title" id="title" value="<?php echo esc_attr( get_the_author_meta( 'Title', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="address_line_1">Address line 1</label></th>
        <td><input type="text" name="address_line_1" id="address_line_1" value="<?php echo esc_attr( get_the_author_meta( 'Address_line_1', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="address_line_2">Address line 2</label></th>
        <td><input type="text" name="address_line_2" id="address_line_2" value="<?php echo esc_attr( get_the_author_meta( 'Address_line_2', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="city">City</label></th>
        <td><input type="text" name="city" id="city" value="<?php echo esc_attr( get_the_author_meta( 'City', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="country">Country</label></th>
        <td><input type="text" name="country" id="country" value="<?php echo esc_attr( get_the_author_meta( 'Country', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
      <th><label for="zip">ZIP/post code</label></th>
      <td><input type="text" name="zip" id="zip" value="<?php echo esc_attr( get_the_author_meta( 'ZIP', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="website">Website URL</label></th>
        <td><input type="text" name="website" id="website" value="<?php echo esc_attr( get_the_author_meta( 'Website', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="phone">Phone</label></th>
        <td><input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'Phone', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="mobile">Mobile phone</label></th>
        <td><input type="text" name="mobile" id="mobile" value="<?php echo esc_attr( get_the_author_meta( 'Mobile_phone', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="secondary_address">Secondary address (Business)</label></th>
        <td><textarea name="secondary_address" rows="6" id="secondary_address"><?php echo esc_attr( get_the_author_meta( 'Secondary_address', $user->ID ) ); ?></textarea></td>
    </tr>
    
    <tr>
        <th><label for="secondary_zip">Secondary ZIP/post code</label></th>
        <td><input type="text" name="secondary_zip" id="secondary_zip" value="<?php echo esc_attr( get_the_author_meta( 'Secondary_ZIP', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="secondary_email">Secondary email</label></th>
        <td><input type="text" name="secondary_email" id="secondary_email" value="<?php echo esc_attr( get_the_author_meta( 'Secondary_email', $user->ID ) ); ?>" /></td>
    </tr>
    
    <tr>
        <th><label for="secondary_phone">Secondary phone</label></th>
        <td><input type="text" name="secondary_phone" id="secondary_phone" value="<?php echo esc_attr( get_the_author_meta( 'Secondary_phone', $user->ID ) ); ?>" /></td>
    </tr>
</table>  

<h3>Specialisms and areas of specific interest.<h3>
<h4>Please indicate which <u>Topic Area(s)</u> you are interested in:</h4>
<?php
// Get SIG interest data, convert to array
$sigs = esc_attr( get_the_author_meta( 'sig_interest', $user->ID ) );
$arr_sigs = explode(",", $sigs);
?>
<table class="form-table">
    <tr>
    	<td>
          <label for="sig_a"><input name="sig_interest[]" id="sig_a" type="checkbox" value="Transport Modes - General" <?php if (in_array("Transport Modes - General", $arr_sigs)) {echo "checked=\"checked\"";} ?> />A. Transport Modes - General</label><br />
          <label for="sig_b"><input name="sig_interest[]" id="sig_b" type="checkbox" value="Freight Transport and Logistics" <?php if (in_array("Freight Transport and Logistics", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>B. Freight Transport and Logistics</label><br />
      	  <label for="sig_c"><input name="sig_interest[]" id="sig_c" type="checkbox" value="Traffic Management Operations and Control" <?php if (in_array("Traffic Management Operations and Control", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>C. Traffic Management, Operations and Control</label><br />
          <label for="sig_d"><input name="sig_interest[]" id="sig_d" type="checkbox" value="Activity and Transport Demand" <?php if (in_array("Activity and Transport Demand", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>D. Activity and Transport Demand</label>
      </td>
      <td>
      	  <label for="sig_e"><input name="sig_interest[]" id="sig_e" type="checkbox" value="Transport Economics and Finance" <?php if (in_array("Transport Economics and Finance", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>E. Transport Economics and Finance</label><br />
          <label for="sig_f"><input name="sig_interest[]" id="sig_f" type="checkbox" value="Transport Land Use and Sustainability" <?php if (in_array("Transport Land Use and Sustainability", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>F. Transport, Land Use and Sustainability</label><br />
          <label for="sig_g"><input name="sig_interest[]" id="sig_g" type="checkbox" value="Transport Planning and Policy" <?php if (in_array("Transport Planning and Policy", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>G. Transport Planning and Policy</label><br />
          <label for="sig_h"><input name="sig_interest[]" id="sig_h" type="checkbox" value="Transport in Developing and Emerging Countries" <?php if (in_array("Transport in Developing and Emerging Countries", $arr_sigs)) {echo "checked=\"checked\"";} ?>/>H. Transport in Developing and Emerging Countries</label>
      </td>
    </tr>
</table>

<!--
<h4>Please indicate any SIGs which you would <u>like to join</u>:</h4>  
<table class="form-table">
  <tr>
    <td>
        <label for="sig_a_join"><input name="sig_a_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_a_join', $user->ID ) ); ?>" />A. Transport Modes - General</label><br />
        <label for="sig_b_join"><input name="sig_b_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_b_join', $user->ID ) ); ?>" />B. Freight Transport and Logistics</label><br />
        <label for="sig_c_join"><input name="sig_c_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_c_join', $user->ID ) ); ?>" />C. Traffic Management, Operations and Control</label><br />
        <label for="sig_d_join"><input name="sig_d_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_d_join', $user->ID ) ); ?>" />D. Activity and Transport Demand</label><br />
    </td>
    <td>
        <label for="sig_e_join"><input name="sig_e_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_e_join', $user->ID ) ); ?>" />E. Transport Economics and Finance</label><br />
        <label for="sig_f_join"><input name="sig_f_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_f_join', $user->ID ) ); ?>" />F. Transport, Land Use and Sustainability</label><br />
        <label for="sig_g_join"><input name="sig_g_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_g_join', $user->ID ) ); ?>" />G. Transport Planning and Policy</label><br />
        <label for="sig_h_join"><input name="sig_h_join" type="checkbox" value="<?php echo esc_attr( get_the_author_meta( 'Sig_h_join', $user->ID ) ); ?>" />H. Transport in Developing and Emerging Countries</label><br />
    </td>
  </tr>
</table>
-->

<h4>Please indicate which <u>Session Track(s)</u> you are interested in:</h4>
<?php
// Get ST interest data sets, convert to arrays

$alpha = array('a','b','c','d','e','f','g','h');

foreach ($alpha as $val) {
	$out.$val = esc_attr( get_the_author_meta( 'session_track_$key', $user->ID ) );
	$arr_st_a = explode(",", $st_a);
}
$st_a = esc_attr( get_the_author_meta( 'session_track_a', $user->ID ) );
$arr_st_a = explode(",", $st_a);
$st_b = esc_attr( get_the_author_meta( 'session_track_b', $user->ID ) );
$arr_st_b = explode(",", $st_b);
$st_c = esc_attr( get_the_author_meta( 'session_track_c', $user->ID ) );
$arr_st_c = explode(",", $st_c);
$st_d = esc_attr( get_the_author_meta( 'session_track_d', $user->ID ) );
$arr_st_d = explode(",", $st_d);
$st_e = esc_attr( get_the_author_meta( 'session_track_e', $user->ID ) );
$arr_st_e = explode(",", $st_e);
$st_f = esc_attr( get_the_author_meta( 'session_track_f', $user->ID ) );
$arr_st_f = explode(",", $st_f);
$st_g = esc_attr( get_the_author_meta( 'session_track_g', $user->ID ) );
$arr_st_g = explode(",", $st_g);
$st_h = esc_attr( get_the_author_meta( 'session_track_h', $user->ID ) );
$arr_st_h = explode(",", $st_h);
?>
<table class="form-table">
  <tr>
    <td>
      <label><input type="checkbox" name="st_a[]" value="A1 - Air Transport and Airports" id="st_a_1" <?php if (in_array("A1 - Air Transport and Airports", $arr_st_a)) {echo "checked=\"checked\"";} ?> />A1: Air Transport and Airports</label><br />
      <label><input type="checkbox" name="st_a[]" value="A2 - Maritime Transport and Ports" id="st_a_2" <?php if (in_array("A2 - Maritime Transport and Ports", $arr_st_a)) {echo "checked=\"checked\"";} ?> />A2: Maritime Transport and Ports</label><br />
      <label><input type="checkbox" name="st_a[]" value="A3 - Rail Transport" id="st_a_3" <?php if (in_array("A3 - Rail Transport", $arr_st_a)) {echo "checked=\"checked\"";} ?> />A3: Rail Transport</label><br />
      <label><input type="checkbox" name="st_a[]" value="A4 - Road Transport - General" id="st_a_4" <?php if (in_array("A4 - Road Transport - General", $arr_st_a)) {echo "checked=\"checked\"";} ?> />A4: Road Transport - General</label><br />
    </td>
    <td>
      <label><input type="checkbox" name="st_b[]" value="B1 - Rail Transport (freight)" id="st_b_1" <?php if (in_array("B1 - Rail Transport (freight)", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B1: Rail Transport</label><br />
      <label><input type="checkbox" name="st_b[]" value="B2 - Freight Transport Operations and Performance" id="st_b_2" <?php if (in_array("B2 - Freight Transport Operations and Performance", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B2: Freight Transport Operations and Performance</label><br />
      <label><input type="checkbox" name="st_b[]" value="B3 - Intermodal Freight Transport" id="st_b_3" <?php if (in_array("B3 - Intermodal Freight Transport", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B3: Intermodal Freight Transport</label><br />
      <label><input type="checkbox" name="st_b[]" value="B4 - Urban Goods Movement" id="st_b_4" <?php if (in_array("B4 - Urban Goods Movement", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B4: Urban Goods Movement</label><br />
      <label><input type="checkbox" name="st_b[]" value="B5 - Freight Transport Modelling" id="st_b_5" <?php if (in_array("B5 - Freight Transport Modelling", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B5: Freight Transport Modelling</label><br />
      <label><input type="checkbox" name="st_b[]" value="B6 - Humanitarian Logistics in Disasters" id="st_b_6" <?php if (in_array("B6 - Humanitarian Logistics in Disasters", $arr_st_b)) {echo "checked=\"checked\"";} ?> />B6: Humanitarian Logistics in Disasters</label><br />
    </td>
  </tr>
  <tr>
    <td>
      <label><input type="checkbox" name="st_c[]" value="C1 - Traffic Theory and Modelling" id="st_c_1" <?php if (in_array("C1 - Traffic Theory and Modelling", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C1: Traffic Theory and Modelling</label><br />
      <label><input type="checkbox" name="st_c[]" value="C2A - Highway Design and Capacity" id="st_c_2" <?php if (in_array("C2A - Highway Design and Capacity", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C2a: Highway Design and Capacity</label><br />
      <label><input type="checkbox" name="st_c[]" value="C2B - Traffic Control and Management" id="st_c_3" <?php if (in_array("C2B - Traffic Control and Management", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C2b: Traffic Control and Management</label><br />
      <label><input type="checkbox" name="st_c[]" value="C3 - Intelligent Transport Systems" id="st_c_4" <?php if (in_array("C3 - Intelligent Transport Systems", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C3: Intelligent Transport Systems</label><br />
      <label><input type="checkbox" name="st_c[]" value="C4 - Traffic Safety Analysis and Policy" id="st_c_5" <?php if (in_array("C4 - Traffic Safety Analysis and Policy", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C4: Traffic Safety Analysis and Policy</label><br />
      <label><input type="checkbox" name="st_c[]" value="C5 - Infrastructure Management" id="st_c_6" <?php if (in_array("C5 - Infrastructure Management", $arr_st_c)) {echo "checked=\"checked\"";} ?> />C5: Infrastructure Management</label><br />
    </td>
    <td>
      <label><input type="checkbox" name="st_d[]" value="D1 - Data Collection and Processing Methods" id="st_d_1" <?php if (in_array("D1 - Data Collection and Processing Methods", $arr_st_d)) {echo "checked=\"checked\"";} ?> />D1: Data Collection and Processing Methods</label><br />
      <label><input type="checkbox" name="st_d[]" value="D2 - Travel Behaviour and Choice" id="st_d_2" <?php if (in_array("D2 - Travel Behaviour and Choice", $arr_st_d)) {echo "checked=\"checked\"";} ?> />D2: Travel Behaviour and Choice</label><br />
      <label><input type="checkbox" name="st_d[]" value="D3 - Applications of Travel Behaviour Analysis and Demand Modelling Approaches" id="st_d_3" <?php if (in_array("D3 - Applications of Travel Behaviour Analysis and Demand Modelling Approaches", $arr_st_d)) {echo "checked=\"checked\"";} ?> />D3: Applications of Travel Behaviour Analysis and Demand Modelling Approaches</label><br />
      <label><input type="checkbox" name="st_d[]" value="D4 - ICT Activities Time Use and Travel Demand" id="st_d_4" <?php if (in_array("D4 - ICT Activities Time Use and Travel Demand", $arr_st_d)) {echo "checked=\"checked\"";} ?> />D4: ICT Activities, Time Use and Travel Demand</label><br />
    </td>
  </tr>
  <tr>
    <td>
      <label><input type="checkbox" name="st_e[]" value="E1 - Transport System Analysis and Economic Evaluation" id="st_e_1" <?php if (in_array("E1 - Transport System Analysis and Economic Evaluation", $arr_st_e)) {echo "checked=\"checked\"";} ?> />E1: Transport System Analysis and Economic Evaluation</label><br />
      <label><input type="checkbox" name="st_e[]" value="E2 - Transport Pricing" id="st_e_2" <?php if (in_array("E2 - Transport Pricing", $arr_st_e)) {echo "checked=\"checked\"";} ?> />E2: Transport Pricing</label><br />
      <label><input type="checkbox" name="st_e[]" value="E3 - Transport Economics" id="st_e_3" <?php if (in_array("E3 - Transport Economics", $arr_st_e)) {echo "checked=\"checked\"";} ?> />E3: Transport Economics</label><br />
    </td>
    <td>
      <label><input type="checkbox" name="st_f[]" value="F1A - Land Use and Transport Planning and Policy" id="st_f_1" <?php if (in_array("F1A - Land Use and Transport Planning and Policy", $arr_st_f)) {echo "checked=\"checked\"";} ?> />F1a: Land Use and Transport Planning and Policy</label><br />
      <label><input type="checkbox" name="st_f[]" value="F1B - Land Use Transport and Environment Interactions and Modelling" id="st_f_2" <?php if (in_array("F1B - Land Use Transport and Environment Interactions and Modelling", $arr_st_f)) {echo "checked=\"checked\"";} ?> />F1b: Land Use, Transport and Environment Interactions and Modelling</label><br />
      <label><input type="checkbox" name="st_f[]" value="F2A - Urban Environment Liveability and Non-motorised Transport" id="st_f_3" <?php if (in_array("F2A - Urban Environment Liveability and Non-motorised Transport", $arr_st_f)) {echo "checked=\"checked\"";} ?> />F2a: Urban Environment, Liveability and Non-motorised Transport</label><br />
      <label><input type="checkbox" name="st_f[]" value="F2B - Transport and Climate Change" id="st_f_4" <?php if (in_array("F2B - Transport and Climate Change", $arr_st_f)) {echo "checked=\"checked\"";} ?> />F2b: Transport and Climate Change</label><br />
      <label><input type="checkbox" name="st_f[]" value="F2C - Sustainability and Environmental Ethics" id="st_f_5" <?php if (in_array("F2C - Sustainability and Environmental Ethics", $arr_st_f)) {echo "checked=\"checked\"";} ?> />F2c: Sustainability and Environmental Ethics</label><br />
    </td>
  </tr>
  <tr>
    <td>
      <label><input type="checkbox" name="st_g[]" value="G1 - Governance and Decision-making Processes" id="st_g_1" <?php if (in_array("G1 - Governance and Decision-making Processes", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G1: Governance and Decision-making Processes</label><br />
      <label><input type="checkbox" name="st_g[]" value="G2 - National and Regional Transport Planning and Policy" id="st_g_2" <?php if (in_array("G2 - National and Regional Transport Planning and Policy", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G2: National and Regional Transport Planning and Policy</label><br />
      <label><input type="checkbox" name="st_g[]" value="G3 - Urban Transport Planning and Policy" id="st_g_3" <?php if (in_array("G3 - Urban Transport Planning and Policy", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G3: Urban Transport Planning and Policy</label><br />
      <label><input type="checkbox" name="st_g[]" value="G4 - Cultural and Social Issues in Transport" id="st_g_4" <?php if (in_array("G4 - Cultural and Social Issues in Transport", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G4: Cultural and Social Issues in Transport</label><br />
      <label><input type="checkbox" name="st_g[]" value="G5 - Transport Security" id="st_g_5" <?php if (in_array("G5 - Transport Security", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G5: Transport Security</label><br />
      <label><input type="checkbox" name="st_g[]" value="G6 - Disaster Resilience in Transport" id="st_g_6" <?php if (in_array("G6 - Disaster Resilience in Transport", $arr_st_g)) {echo "checked=\"checked\"";} ?> />G6: Disaster Resilience in Transport</label><br />
    </td>
    <td>
      <label><input type="checkbox" name="st_h[]" value="H1 - Institutions Governance and Capacity Building" id="st_h_1" <?php if (in_array("H1 - Institutions Governance and Capacity Building", $arr_st_h)) {echo "checked=\"checked\"";} ?> />H1: Institutions, Governance and Capacity Building</label><br />
      <label><input type="checkbox" name="st_h[]" value="H2 - Planning Financing Socio-economic Impact Evaluation" id="st_h_2" <?php if (in_array("H2 - Planning Financing Socio-economic Impact Evaluation", $arr_st_h)) {echo "checked=\"checked\"";} ?> />H2: Planning, Financing, Socio-economic Impact Evaluation</label><br />
      <label><input type="checkbox" name="st_h[]" value="H3 - Infrastructure Operation and Traffic Management" id="st_h_3" <?php if (in_array("H3 - Infrastructure Operation and Traffic Management", $arr_st_h)) {echo "checked=\"checked\"";} ?> />H3: Infrastructure Operation and Traffic Management</label><br />
      <label><input type="checkbox" name="st_h[]" value="H4 - Regional and Interregional Transport" id="st_h_4" <?php if (in_array("H4 - Regional and Interregional Transport", $arr_st_h)) {echo "checked=\"checked\"";} ?> />H4: Regional and Interregional Transport</label><br />
      <label><input type="checkbox" name="st_h[]" value="H5 - Urban Transport" id="st_h_5" <?php if (in_array("H5 - Urban Transport", $arr_st_h)) {echo "checked=\"checked\"";} ?> />H5: Urban Transport</label><br />
    </td>
  </tr>
</table>

<h4>WCTRS-Young initiatives are open to members who are under 35 on 10th July 2016. If you wish to participate, please specify your date of birth:</h4>  
<table class="form-table">
	<tr>
    	<th><label for="date_of_birth">Date of birth</label></th>
        <td><input name="date_of_birth" type="text" value="<?php echo esc_attr( get_the_author_meta( 'Date_of_birth', $user->ID ) ); ?>" /><br />
			<p class="description">dd/mm/yyyy</p></td>
    </tr>
</table>

<h3>WCTRS Membership Directory</h3>
<p>To enable you to share your Personal Information (PI) with other members through the WCTRS Directory, we need your authorisation. Please indicate your decision below.</p>
<table class="form-table">
	<tr>
    	<th><label for="share_pi_yes"><u>YES</u> - I am happy to share my personal information with other members through the on-line Directory<br />
    	  <br />
   	  (<em>The information shared will be: name, city, country, email, primary phone number, topic areas and session tracks</em>) </label></th>
        <td><input type="radio" name="share_pi" id="share_pi_yes" value="yes" <?php if ( esc_attr(get_the_author_meta( 'Share_PI', $user->ID )) == "yes" ) {echo "checked=\"checked\"";} ?> /></td>

    	<th><label for="share_pi_no"><u>NO</u> - I do not wish to share my personal information and understand that I may not be able to access the personal information of others</label></th>
        <td><input type="radio" name="share_pi" id="share_pi_no" value="no" <?php if ( esc_attr(get_the_author_meta( 'Share_PI', $user->ID )) == "no" ) {echo "checked=\"checked\"";} ?> /></td>
  </tr>
</table>

<h3>Subscription to WCTRS Official Journals Transport Policy and Case Studies on Transport Policy</h3>
<p>Members automatically receive a free on-line subscription to these two journals, unless they advise us otherwise. In order to activate this, we need your permission to forward your contact details Elsevier, who will use them purely to set up your free subscription. Please indicate your preference below.</p>
<table class="form-table">
	<tr>
    	<th><label for="journal_subscription_yes">Please <u>ACTIVATE</u> my free subscription</label></th>
        <td><input type="radio" name="journal_subscription" id="journal_subscription_yes" value="yes" <?php if ( esc_attr(get_the_author_meta( 'Journal_subscription', $user->ID )) == "yes" ) {echo "checked=\"checked\"";} ?> /></td>

    	<th><label for="journal_subscription_no">Please <u>DO NOT</u> activate my subscription</label></th>
        <td><input type="radio" name="journal_subscription" id="journal_subscription_no" value="no" <?php if ( esc_attr(get_the_author_meta( 'Journal_subscription', $user->ID )) == "no" ) {echo "checked=\"checked\"";} ?> /></td>
  </tr>
  
  <tr>
        <th colspan="1">Membership expiration date:</th>
        <td colspan="3">
		<?php 
		// If user is an Editor, make the date expiration field editable
		if ( current_user_can( 'edit_user', $user_id ) ) {
			
			if ( esc_attr(get_the_author_meta( 'date_expiration', $user->ID )) == "" || strlen(esc_attr(get_the_author_meta( 'date_expiration', $user->ID ))) > '0') { 
				?>
				<input name="date_exp" type="text" value="<?php esc_attr(the_author_meta( 'date_expiration', $user->ID )); ?>" maxlength="10" /><br />
				<p class="description">dd/mm/yyyy</p>
				<?php
			}
			
			else {
				echo "Date not set.";
			}
		
		}
		// Otherwise write the exp date as undeditable text
		else {
			
			if ( esc_attr(get_the_author_meta( 'date_expiration', $user->ID )) == "" || strlen(esc_attr(get_the_author_meta( 'date_expiration', $user->ID ))) > '0') {
				esc_attr(the_author_meta( 'date_expiration', $user->ID ));
			}
			
			else {
				echo "Date not set.";
			}
		}
		?>
        </td>
  </tr>
  
</table>

<?php }




/*
 * Saving the custom user fields to Wordpress user tables...
 */

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_usermeta( $user_id, 'Title', $_POST['title'] );
	update_usermeta( $user_id, 'Address_line_1', $_POST['address_line_1'] );
	update_usermeta( $user_id, 'Address_line_2', $_POST['address_line_2'] );
	update_usermeta( $user_id, 'City', $_POST['city'] );
	update_usermeta( $user_id, 'Country', $_POST['country'] );
	update_usermeta( $user_id, 'ZIP', $_POST['zip'] );
	update_usermeta( $user_id, 'Website', $_POST['website'] );
	update_usermeta( $user_id, 'Phone', $_POST['phone'] );
	update_usermeta( $user_id, 'Mobile_phone', $_POST['mobile'] );
	update_usermeta( $user_id, 'Secondary_address', $_POST['secondary_address'] );
	update_usermeta( $user_id, 'Secondary_ZIP', $_POST['secondary_zip'] );
	update_usermeta( $user_id, 'Secondary_email', $_POST['secondary_email'] );
	update_usermeta( $user_id, 'Secondary_phone', $_POST['secondary_phone'] );
	
	$arr_sig_interest = implode(",", $_POST['sig_interest']);
	update_usermeta( $user_id, 'sig_interest', $arr_sig_interest );

	$arr_st_a = implode(",", $_POST['st_a']);
	update_usermeta( $user_id, 'session_track_a', $arr_st_a );
	$arr_st_b = implode(",", $_POST['st_b']);
	update_usermeta( $user_id, 'session_track_b', $arr_st_b );
	$arr_st_c = implode(",", $_POST['st_c']);
	update_usermeta( $user_id, 'session_track_c', $arr_st_c );
	$arr_st_d = implode(",", $_POST['st_d']);
	update_usermeta( $user_id, 'session_track_d', $arr_st_d );
	$arr_st_e = implode(",", $_POST['st_e']);
	update_usermeta( $user_id, 'session_track_e', $arr_st_e );
	$arr_st_f = implode(",", $_POST['st_f']);
	update_usermeta( $user_id, 'session_track_f', $arr_st_f );
	$arr_st_g = implode(",", $_POST['st_g']);
	update_usermeta( $user_id, 'session_track_g', $arr_st_g );
	$arr_st_h = implode(",", $_POST['st_h']);
	update_usermeta( $user_id, 'session_track_h', $arr_st_h );

	update_usermeta( $user_id, 'Date_of_birth', $_POST['date_of_birth'] );
	update_usermeta( $user_id, 'Share_PI', $_POST['share_pi'] );
	update_usermeta( $user_id, 'Journal_subscription', $_POST['journal_subscription'] );
	update_usermeta( $user_id, 'date_expiration', $_POST['date_exp'] );
	
	
	//Send email to WCTRS admin (Jennie) informing of update
	$message = "A WCTRS member's profile has been updated...\n\n";
	$message .= "Name: ".get_the_author_meta( 'last_name', $user_id).", ".get_the_author_meta( 'first_name', $user_id)."\n"; 
	$message .= "Email: ".get_the_author_meta( 'user_email', $user_id)."\n";
	$message .= "Share PI?: ".get_the_author_meta( 'Share_PI', $user_id)."\n";
	$message .= "Journal subscription?: ".get_the_author_meta( 'Journal_subscription', $user_id)."\n";

    //@wp_mail('b.broadbent@its.leeds.ac.uk', 'WCTRS Member Profile Update', $message);
	@wp_mail('J.Stones@.leeds.ac.uk', 'WCTRS Member Profile Update', $message);
}



/*
 * Hide unwanted fields in profile page
 */
add_action('admin_head','hide_personal_options');
function hide_personal_options() { ?>
<script type="text/javascript">
		jQuery(document).ready(function($) { 
			//$('#your-profile > h3').hide(); // removes all headers
			//$('#your-profile > table:first').hide(); // remove the entire Personal Options table
			//$("#nickname,#display_name,#url,#description,#googleplus,#twitter,#facebook").parent().parent().remove();  // remove nickname, display name, website fields, etc.
			$("#display_name,#url,#description,#googleplus,#twitter,#facebook").parent().parent().remove();  // remove nickname, display name, website fields, etc.
		});
    </script>
<?php
}

?>