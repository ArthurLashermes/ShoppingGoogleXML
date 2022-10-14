<?php

namespace GoogleShoppingXml\Controller;

use GoogleShoppingXml\Model\GoogleshoppingxmlIgnoreCategoryQuery;
use Thelia\Controller\Admin\BaseAdminController;

class CategoryController extends BaseAdminController
{
    public function deleteCategory(): \Symfony\Component\HttpFoundation\Response
    {
        $request = $this->getRequest();
        $id_category = $request->get('additional_category_id');

        GoogleshoppingxmlIgnoreCategoryQuery::create()->findOneByCategoryId($id_category)->setIsExportable(0)->save();

        $redirectParameters = array(
            'module_code' => 'GoogleShoppingXml',
            'current_tab' => 'advanced'
        );

        return $this->generateRedirectFromRoute("admin.module.configure", array(), $redirectParameters);


    }

    public function addCategory(): \Symfony\Component\HttpFoundation\Response
    {
        $redirectParameters = array(
            'module_code' => 'GoogleShoppingXml',
            'current_tab' => 'advanced'
        );

        $request = $this->getRequest();
        $id_category = $request->get('selectedId');
        if ($id_category == ""){
            return $this->generateRedirectFromRoute("admin.module.configure", array(), $redirectParameters);
        }
        GoogleshoppingxmlIgnoreCategoryQuery::create()->findOneByCategoryId($id_category)->setIsExportable(1)->save();



        return $this->generateRedirectFromRoute("admin.module.configure", array(), $redirectParameters);
    }

}