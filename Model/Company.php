<?php
App::uses('AppModel', 'Model');

/**
 * Company Model
 *
 */
class Company extends AppModel {

	public $useTable = 'company_app';
    public $primaryKey = 'company_id';

    
    
    public function saveData($data , $id)
    {
        $this->id = $id;
        $data['Company']['last_update'] = date('Y-m-d H:i:s');
        
        
        //handle image
        $ds          = DIRECTORY_SEPARATOR;
        $storeFolder = '..\webroot\files\images'. $ds .'logo' . $ds . $id;
        
        $tempFile = $data['Company']['company_logo']['tmp_name'];
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        if (!file_exists($targetPath)) {
            mkdir($targetPath, 0777, true);
        }
        $targetFile =  $targetPath. $data['Company']['company_logo']['name'];
        move_uploaded_file($tempFile,$targetFile);
        //------------------------
        
        
        $data['Company']['company_logo'] = $data['Company']['company_logo']['name'];
        
        return $this->save($data , $id);
    }
}
