<?php 

    function get_copyright(){
        
        $html_copyright = "
            <div class = 'copyright'>	
		        <div class = 'copyright-left-side'>Copyright " . date('Y') . "</div>
		        <div class = 'copyright-right-side'>
			        Powered by 
			        <a href='https://generatepress.com/' target='_blank' class='footer-link underline'>			GeneratePress</a> — Developed by 
			        <a href='./' target='_blank' class='footer-link-copyright underline'>MGovea</a>
		        </div>
	        </div> 
        ";

        return $html_copyright;
    }
?>