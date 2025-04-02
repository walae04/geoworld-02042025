<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['name']) && !empty($_GET['name']) ){
$name = ($_GET['name']);
$detailpays =  getPaysName($name);
//var_dump($detailpays);
}
?>

<div class="container">
<?php
echo "<h1>  $detailpays->Name </h1>"; ?>
<div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
         <tr>
          <th>drapeaux</th>
         <th> id</th> 
         <th>Code</th> 
         <th>Name</th>
         <th>Continent</th> 
         <th>Region</th> 
         <th>SurfaceArea</th> 
         <th>IndepYear</th> 
         <th>Population</th>
         <th>LifeExpectancy</th> 
         <th>GNP</th> 
         <th>GNPOld</th> 
         <th> LocalName </th>
         <th>GovernmentForm</th> 
         <th>HeadOfState </th>
         
         <th>Capital </th>
         

           
           
         </tr>
        </thead>
        <tbody>
    
        
         
      
          <tr>
            <td> <?php $source= "images/flag/".strtolower($detailpays->Code2).".png"?>
            <img src=<?=  $source; ?> ></td> 
            <td> <?php echo $detailpays->id ?></td>
            <td> <?php echo $detailpays->Code ?></td> 
            <td> <?php echo $detailpays->Name ?></td> 
            <td> <?php echo $detailpays->Continent?></td> 
            <td> <?php echo $detailpays->Region ?></td> 
            <td> <?php echo $detailpays->SurfaceArea?></td> 
            <td> <?php echo $detailpays->IndepYear ?></td> 
            <td> <?php echo $detailpays->Population ?></td> 
            <td> <?php echo $detailpays->LifeExpectancy ?></td> 
            <td> <?php echo $detailpays->GNP ?></td> 
            <td> <?php echo $detailpays->GNPOld ?></td> 
            <td> <?php echo $detailpays->LocalName ?></td> 
            <td> <?php echo $detailpays->GovernmentForm ?></td> 
            <td> <?php echo $detailpays->HeadOfState ?></td>
            
            <td> <?php  echo getCapitale($detailpays->Capital)->Name; ?></td>
           
         
            
            

           </tr>
           
        </tbody>
      </table>
    
    

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>