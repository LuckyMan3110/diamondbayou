<?php
    
    function signatureDiamond($cols=array(), $type='signature_diamonds') {
        $lot            = '4'.trim($cols[0]);
        $stock_no       = trim($cols[0]);        
        $shape          = trim($cols[1]);
        $clarity        = trim($cols[2]);
        $caratWeight    = trim($cols[3]);
        $color          = trim($cols[4]);
        //$colorDesc      = trim($cols[5]);
        $certification  = trim($cols[6]);
        $certNo         = trim($cols[7]);
        $culet          = trim($cols[8]);
        $depth          = trim($cols[9]);
        $table          = trim($cols[10]);
        $flour          = trim($cols[11]);
        $girlde         = trim($cols[12]);
        $make           = trim($cols[13]);
        $polish         = trim($cols[14]);
        $sym            = trim($cols[15]);
        $mmsize         = trim($cols[16]);
        $pricePerCarat  = trim($cols[17]);
        $percentOfRpanet = trim($cols[18]);
        $rapnetPrice     = trim($cols[19]);
        $totalPrice     = trim($cols[20]);
        $updatedDate    = trim($cols[21]);
        $comments       = trim($cols[22]);
        $minDia         = trim($cols[23]);
        $maxDia         = trim($cols[24]);
        $agta           = trim($cols[25]);
        $idealCut       = trim($cols[26]);
        $russianCut     = trim($cols[27]);
        $imagePath      = trim($cols[28]);
        $certPath       = trim($cols[29]);
        $webAddress     = trim($cols[30]);
        $imagePath2     = trim($cols[31]);
        $imagePath3     = trim($cols[32]);
        $cut            = trim($cols[33]);
        $meas           = trim($cols[34]);
        $country        = trim($cols[35]);
        $priceInCsv = $totalPrice;
        
        $insertValues = "('{$lot}', '{$stock_no}', '{$shape}', '{$clarity}', '{$caratWeight}', '{$color}', '{$certification}', '{$certNo}', '{$culet}', '{$depth}', '{$table}', '{$flour}', '{$girlde}', '{$make}', '{$polish}', '{$sym}', '{$mmsize}', '{$pricePerCarat}', '{$percentOfRpanet}', '{$rapnetPrice}', '{$totalPrice}', '{$updatedDate}', '{$comments}', '{$minDia}', '{$maxDia}', '{$agta}', '{$idealCut}', '{$russianCut}', '{$imagePath}', '{$certPath}', '{$webAddress}', '{$imagePath2}', '{$imagePath3}', '{$cut}', '{$meas}', '{$country}', '{$priceInCsv}', '{$type}')";
        
        return $insertValues;        
    }
    
    function signatureGemstones($cols=array(), $dtype='signature_gemstones') {
        $lot            = '3'.trim($cols[0]);
        $stock_no       = trim($cols[0]);        
        $type           = trim($cols[1]);
        $shape          = trim($cols[2]);
        $cut            = trim($cols[3]);
        $clarity        = trim($cols[4]);
        $caratWeight    = trim($cols[5]);
        $color          = trim($cols[6]);
        $cert_lab       = trim($cols[7]);
        $certNo         = trim($cols[8]);
        $totalDepth     = trim($cols[9]);
        $flour          = trim($cols[10]);
        $girdle         = trim($cols[11]);
        $make           = trim($cols[12]);
        $polish         = trim($cols[13]);
        $sym            = trim($cols[14]);
        $mmsize         = trim($cols[15]);
        $pricePerCarat  = trim($cols[16]);
        $totalPrice     = trim($cols[17]);
        $updatedDate    = trim($cols[18]);
        $comments       = trim($cols[19]);
        $agta           = trim($cols[20]);
        $colorCode      = trim($cols[21]);
        $imagePath      = trim($cols[22]);
        $certPath       = trim($cols[23]);
        $webAddress     = trim($cols[24]);
        $colorDesc      = trim($cols[25]);
        $imagePath2     = trim($cols[26]);
        $imagePath3     = trim($cols[27]);
        $meas           = trim($cols[28]);        
        $priceInCsv = $totalPrice;
        
        $insertValues = "('{$lot}', '{$stock_no}', '{$type}', '{$shape}', '{$cut}', '{$clarity}', '{$caratWeight}', '{$color}', '{$cert_lab}', '{$certNo}', '{$totalDepth}', '{$flour}', '{$girdle}', '{$make}', '{$polish}', '{$sym}', '{$mmsize}', '{$pricePerCarat}', '{$totalPrice}', '{$updatedDate}', '{$comments}', '{$agta}', '{$colorCode}', '{$imagePath}', '{$certPath}', '{$webAddress}', '{$colorDesc}', '{$imagePath2}', '{$imagePath3}', '{$meas}', '{$priceInCsv}', '{$dtype}')";
                
        return $insertValues;     
    }