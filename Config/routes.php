<?php
//DASHBOARD
Router::connect('/dashboard/customer', 
    array(
        'controller' => 'dashboard', 
        'action' => 'customer'
    )
);

Router::connect('/dashboard/profile', 
    array(
        'controller' => 'dashboard', 
        'action' => 'profile'
    )
);
//END DASHBOARD
/*
*
*
*
*/
//LOGIN
Router::connect('/dashboard/login', 
    array(
        'controller' => 'login', 
        'action' => 'login'
    )
);

Router::connect('/dashboard/logout', 
    array(
        'controller' => 'login', 
        'action' => 'logout'
    )
);
//----END LOGIN
/*
*
*
*
*/
//UPLOAD
Router::connect('/upload/attachment', 
    array(
        'controller' => 'upload', 
        'action' => 'attachment'
    )
);
Router::connect('/upload/images', 
    array(
        'controller' => 'upload', 
        'action' => 'images'
    )
);
Router::connect('/dashboard/products/default-image', 
    array(
        'controller' => 'upload', 
        'action' => 'defaultimage'
    )
);
Router::connect('/dashboard/products/delete-image', 
    array(
        'controller' => 'upload', 
        'action' => 'deleteimages'
    )
);
Router::connect('/dashboard/products/delete-attachment', 
    array(
        'controller' => 'upload', 
        'action' => 'deleteattachment'
    )
);
//-------END UPLOAD
/*
*
*
*
*/
//PRODUCTS
Router::connect('/dashboard/products/add/step-1', 
    array(
        'controller' => 'products', 
        'action' => 'addProducts'
    )
);
Router::connect('/dashboard/products/add/step-2/:id', 
    array(
        'controller' => 'products', 
        'action' => 'uploadProductsInfo'
    ) , 
    array(
        'id' => '[0-9]+'
    )
);
Router::connect('/dashboard/products/edit/:id', 
    array(
        'controller' => 'products', 
        'action' => 'editProducts'
    ) , 
    array(
        'id' => '[0-9]+'
    )
);

Router::connect('/dashboard/products/delete', 
    array(
        'controller' => 'products', 
        'action' => 'deleteProduct'
    )
);

Router::connect('/dashboard/products/status', 
    array(
        'controller' => 'products', 
        'action' => 'changeStatus'
    )
);
Router::connect('/dashboard/products/*', 
    array(
        'controller' => 'products', 
        'action' => 'index'
    )
);

//-------END PRODUCTS
/*
*
*
*
*/
//PURCHASE ORDER
Router::connect('/dashboard/purchase-order/details/:id', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'details'
    ) , 
    array(
        'id' => '[0-9]+'
    )
);
Router::connect('/dashboard/purchase-order/progress', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'progress'
    )
);
Router::connect('/dashboard/purchase-order/completed', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'completed'
    )
);

Router::connect('/dashboard/purchase-order/reject', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'reject'
    )
);
Router::connect('/dashboard/purchase-order/*', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'index'
    )
);
/*
*
*
*ORDER HISTORY

*/
Router::connect('/dashboard/order-history/details/:id', 
    array(
        'controller' => 'PurchaseOrder', 
        'action' => 'details'
    ) , 
    array(
        'id' => '[0-9]+'
    )
);

Router::connect('/dashboard/order-history/*', 
    array(
        'controller' => 'history', 
        'action' => 'index'
    )
);
/*
*
*
*
*END ORDER HISTORY
*/
Router::connect('/dashboard/ticket/details/:id', 
    array(
        'controller' => 'ticket', 
        'action' => 'details'
    ) , 
    array(
        'id' => '[0-9]+'
    )
);

Router::connect('/dashboard/ticket/*', 
    array(
        'controller' => 'ticket', 
        'action' => 'index'
    )
);

