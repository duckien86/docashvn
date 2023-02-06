<?php

/**
 * Class ActiveRecord includes SoftDelete
 */
class ActiveRecord extends CActiveRecord
{

    CONST STATUS_ACTIVE = 1;
    CONST STATUS_INACTIVE = 0;

    public static function getListStatus(){
        return array(
            self::STATUS_ACTIVE => Yii::t('web/form','Active'),
            self::STATUS_INACTIVE => Yii::t('web/form','Inactive'),
        );
    }

    public static function getStatusLabel($status)
    {
        $data = self::getListStatus();
        return isset($data[$status]) ? $data[$status] : $status;
    }

    /**
     * Based on ActiveRecord delete() but instead of actually deleting it sets an attribute to deleted=true.
     * Others have chosen to implement this as a behavior; this should be standard AR practice, but in order
     * to maintain backwards compatibility with a few models which use delete() to actually delete models it must not be overridden (delete).
     *
     * Performs a logical delete.
     **/
    public function softDelete()
    {
        if(!$this->getIsNewRecord())
        {
            $attributeNames = $this->getDeletedAttributeNames();
            if( empty($attributeNames) )
                throw new Exception('The active record cannot be soft deleted without an appropriately named attribute (deleted, visible, active).');
            Yii::trace(get_class($this).'.delete()','system.db.ar.CActiveRecord');
            if($this->beforeDelete())
            {
                $attributes = array();
                foreach ($attributeNames as $attributeName){
                    if($attributeName == 'deleted'){
                        $attributes[$attributeName] = 1;
                    }
                    if($attributeName == 'deleted_at'){
                        $attributes[$attributeName] = date('Y-m-d H:i:s');
                    }
                }

                $result = $this->saveAttributes($attributes) > 0;
                $this->afterDelete();
                return $result;
            }
            else
                return false;
        }
        else
            throw new CDbException(Yii::t('yii','The active record cannot be deleted because it is new.'));
    }
    /**
     * Used by softDelete() to determine the name of the attribute which is to be updated
     * in order to achieve a logical delete.
     **/
    private function getDeletedAttributeNames()
    {
        $attributes = array();
        if($this->hasAttribute('deleted')){
            $attributes[] = 'deleted';
        }
        if($this->hasAttribute('deleted_at')){
            $attributes[] = 'deleted_at';
        }
        return $attributes;
    }


    public function getOriginalTableName()
    {
        return Yii::app()->db->tablePrefix.str_replace(array('{{','}}'),'',$this->tableName());
    }

    protected function getToken()
    {
        $token = null;
        $header = getallheaders();
        if(is_array($header)){
            $header = array_change_key_case($header, CASE_LOWER);
        }
        if(isset($header['authorization']) && !empty($header['authorization'])){
            $authorization = $header['authorization'];
            $arrToken = explode(' ', $authorization);
            $token = $arrToken[1];
        }
        return $token;
    }

    protected function beforeSave()
    {
        if($this->isNewRecord){
            if($this->hasAttribute('created_at')){
                $this->created_at = date('Y-m-d H:i:s');
            }
            if($this->hasAttribute('created_by')){
                if(isset(Yii::app()->user->id)){
                    $this->created_by = Yii::app()->user->id;
                }
            }
            if($this->hasAttribute('status') && !isset($this->status)){
                $this->status = self::STATUS_ACTIVE;
            }
        }
        if($this->hasAttribute('updated_at')){
            $this->updated_at = date('Y-m-d H:i:s');
        }

        return TRUE;
    }

    public function isDeleted()
    {
        if($this->hasAttribute('deleted') && $this->deleted == 1){
            if($this->deleted == 1){
                return TRUE;
            }
        }
        return FALSE;
    }

}
?>