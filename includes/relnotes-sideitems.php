<?php
function sideItemReleases($version="", $total=0)
{
    global $PR, $projct, $vpicker_all, $additionalSideItems;
    /* link hack for SDO case */
    if ($projct == "sdo")
    {
        $projct2 = "sdo";
        $projct = "emf";        
    }
    else
    {
        $projct2 = $projct;        
    }

    $out = "";
    if ( (isset($vpicker_all) && sizeof($vpicker_all)>0) || $additionalSideItems )
    {
    
        $out .= '
    	<div class="sideitem">
    		<h6>Releases</h6>
    		<p>
    			<ul>
';		
        foreach ($vpicker_all as $label => $ver)
        {
            $out .= '<li><a href="http://www.eclipse.org/' . $PR . '/news/relnotes.php?project=' . $projct2 . '&amp;version=' . $ver . '">' . $ver . '</a>' . 
                ($ver == $version && $total > 0 ? " ($total bugs total)" : "") . '</li>'."\n";
        }
    	$out .= $additionalSideItems . '
    			</ul>
    		</p>
    	</div>
';
    }
    return $out; 
}
?>