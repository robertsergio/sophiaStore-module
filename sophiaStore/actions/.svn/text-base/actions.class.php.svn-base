<?php

/**
 * userAttributeType actions.
 *
 * @package    sophia
 * @subpackage sophiahome
 * @author     Yassel Diaz Gomez
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sophiaStoreActions extends sfActions
{
  public function preExecute()
  {
//    $actions = array('paymentList');
//    if (($this->getUser()->isAnonymous()) && in_array($this->getActionName(), $actions))
//    {
//      $this->setLayout('layout_sophia_store');
//      $this->forward(sfConfig::get('sf_login_module'), sfConfig::get('sf_login_action'));
//    }
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->articles = ArticlePeer::getLastArticles(12);
  }
  
  public function executeListArticle(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->current_category = CategoryPeer::retrieveByPK($request->getParameter('id'));

    $this->forward404If(!$this->current_category);
    
    $this->articles = ArticlePeer::getActiveArticles($this->current_category->getId());
    
    $this->paths = array();
    $this->paths[] = array('text' => $this->current_category->getName(),
                           'link' => $this->getController()->genUrl('sophiaStore/listArticle?id='.$this->current_category->getId()));
    
    $pager = new sfPropelPager('Article', 10);
    $pager->setCriteria(new Criteria());
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
  }
 
  public function executeShowArticle(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->article = ArticlePeer::retrieveByPK($request->getParameter('article_id'));
    
    $this->forward404If(!$this->article);
    
    $this->paths = array();
    $this->paths[] = array('text' => $this->article->getSubCategory()->getCategory()->getName(),
                           'link' => $this->getController()->genUrl('sophiaStore/listArticle?id='.$this->article->getSubCategory()->getCategory()->getId()));
    $this->paths[] = array('text' => $this->article->getName(),
                           'link' => $this->getController()->genUrl('sophiaStore/showArticle?article_id='.$this->article->getId()));
   
    $this->relatedArticles = ArticlePeer::getRelatedArticles(4, $this->article->getId(), $this->article->getSubCategoryId());
  }
  
  public function executeShowArticle2(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->article = ArticlePeer::retrieveByPK($request->getParameter('article_id'));
    
    $this->forward404If(!$this->article);
    
    $this->paths = array();
    $this->paths[] = array('text' => $this->article->getSubCategory()->getCategory()->getName(),
                           'link' => $this->getController()->genUrl('sophiaStore/listArticle?id='.$this->article->getSubCategory()->getCategory()->getId()));
    $this->paths[] = array('text' => $this->article->getName(),
                           'link' => $this->getController()->genUrl('sophiaStore/showArticle?article_id='.$this->article->getId()));
   
  }
  
  public function executeAddToCart(sfWebRequest $request)
  {    
    $cart = $this->createCartIfNotExists();
    
    if($this->getUser()->isAuthenticated())
    {
      $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
      $cart->setClientId($promoter->getClientId());
      $cart->save();
    }
    
    $value = $request->getParameter('article_id');

    $article = ArticlePeer::retrieveByPK($value);
    
    if($value > 0 && isset ($article))
    {
      $this->createCartArticle($cart,$article, 1);
      
      $this->getUser()->setFlash('notice','Se ha agregado a su carrito el articulo "'.$article->getName().'".');
    }
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function executeShoppingCart(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    $this->paths = array();

    if ($this->getUser()->isAuthenticated()) 
    {
      $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
      $this->carts = CartPeer::getActiveCarts($promoter->getClientId());
    }
    $cart = $this->createCartIfNotExists();
    
    $selected_cart = $request->getParameter('cart_id');
    
    if(isset ($selected_cart))
    {
      $this->carts = null;
      $cart = CartPeer::retrieveByPK($selected_cart);
    }
    
    if ($request->isMethod('post'))
    {
      $this->articles = ArticlePeer::doSelect(new Criteria());
      
      foreach ($this->articles as $key => $article) 
      {
        $value = $request->getParameter($article->getId());
        
        if($value > 0)
        {
          $this->createCartArticle($cart,$article,$value);
        }
      }
    }
    
    $this->cart_articles = $cart->getCartArticles();

    //sacar articulos mayor a 1 mes en el carrito
    foreach ($this->cart_articles as $cart_article)
    {
      $fecha = $this->dateadd($cart_article->getUpdatedAt(),0,1,0,0,0,0);
      $date1 = new DateTime("now");
      $date2 = new DateTime($fecha);
      if($date1 > $date2)
      {
        $cart_article->delete();
        $cart_article->save();
      }
    }
    
    $this->total = 0;
    
    foreach ($this->cart_articles as $cart_article)
    {
      $this->total += $cart_article->getPrice() * $cart_article->getQuantity();
    }
    
    $this->cart_id = $cart->getId();
    
    if($this->total == 0)
    {
      $this->getUser()->setFlash('error','No tiene productos en su carrito.');
      $this->redirect('sophiaStore/index');
    }
    
    $this->more_carts = false;
  }
  
  public function executeShoppingCart2(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    $this->paths = array();
    
    $promoter = $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
    $this->state = $promoter->getIdState();
    
    $this->articles = ArticlePeer::doSelect(new Criteria());
    
    if ($request->isMethod('post'))
    {
      $cart = $this->createCartIfNotExists();
      
      foreach ($this->articles as $key => $article) 
      {
        $value = $request->getParameter($article->getId());
        
        if($value > 0)
        {
          $this->createCartArticle($cart,$article,$value);
        }
      }
    }
    
    $cart = CartPeer::getCart($promoter->getClientId());

    
    if(!isset($cart))
      $cart = new Cart();
    
    $this->cart_articles = $cart->getCartArticles();

    //sacar articulos mayor a 1 mes en el carrito
    foreach ($this->cart_articles as $cart_article)
    {
      $fecha = $this->dateadd($cart_article->getUpdatedAt(),0,1,0,0,0,0);
      $date1 = new DateTime("now");
      $date2 = new DateTime($fecha);
      if($date1 > $date2)
      {
        $cart_article->delete();
        $cart_article->save();
      }
      
    }
    
    $this->total = 0;
    
    foreach ($this->cart_articles as $cart_article)
    {
      $this->total += $cart_article->getPrice() * $cart_article->getQuantity();
    }
  }
  
  private function createCartIfNotExists()
  {
    if($this->getUser()->isAuthenticated())
    {
      $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
      $cart = CartPeer::getCart($promoter->getClientId());
      if(isset ($cart))
        return $cart;
    }
    
    $cart = CartPeer::getCartByIdSession(session_id());
    
    if(!isset ($cart))
    {
      $cart = new Cart();
      $cart->setIdState(2);
      //$cart->setClientId($promoter->getClientId());
      //$cart->setClosingTime()  //modificar yml
      $cart->setNightAuditId(1);
      $cart->setIdSession(session_id()); 
      $cart->save();
    }
    return $cart;
    
  }
  
  private function createCartArticle(Cart $cart, Article $article, $quantity)
  {
    $cart_article = CartArticlePeer::getCartArticle($cart->getId(), $article->getId());
    
    if(isset ($cart_article))
    {
      $cart_article->setQuantity($cart_article->getQuantity() + $quantity);
      $cart_article->save();
      
      return $cart_article;
    }
    
    $cart_article = new CartArticle();
    $cart_article->setIdState(2);
    $cart_article->setCartId($cart->getId());
    $cart_article->setArticleId($article->getId());
    $cart_article->setDiscountId(1);  //modificar yml
    $cart_article->setQuantity($quantity);
    $cart_article->setPrice($article->getPrice()); //modificar price = price * discount
    $cart_article->save();
    
    return $cart_article;
  }
  
  public function executeUpdateCart(sfWebRequest $request)
  {   
    $removes = $request->getParameter('remove');
    $quantities = $request->getParameter('quantity');
    
    if(isset ($removes))
    {
      foreach ($removes as $remove)
      {
        $cart_article = CartArticlePeer::getCartArticleById($remove);
        $cart_article->setDeletedBy($this->getUser()->getId());
        $cart_article->delete();
        $cart_article->save();
      }
    }
    
    foreach ($quantities as $key => $quantity)
    {
      $cart_article = CartArticlePeer::getCartArticleById($key);
      
      if(!$cart_article)
        continue;
      
      $quantity = ($quantity > 0) ? $quantity : 1;
      $cart_article->setQuantity($quantity);
      $cart_article->save();
    }
    
    $this->getUser()->setFlash('notice', 'El carrito se ha actualizado correctamente.');

    $this->redirect('sophiaStore/shoppingCart');
  }

  public function executeAddQuantity(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    
    $this->forward404If(!$id);
    
    $cart_article = CartArticlePeer::getCartArticleById($id);
    $cart_article->setQuantity($cart_article->getQuantity() + 1);
    $cart_article->save();
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function executeReduceQuantity(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    
    $this->forward404If(!$id);
    
    $cart_article = CartArticlePeer::getCartArticleById($id);
    $quantity = ($cart_article->getQuantity() > 1) ? $cart_article->getQuantity() - 1: 1;
    $cart_article->setQuantity($quantity);
    $cart_article->save();
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    
    $this->forward404If(!$id);
    
    $cart_article = CartArticlePeer::getCartArticleById($id);
    //$cart_article->setDeletedBy($this->getUser()->getId());
    $cart_article->delete();
    $cart_article->save();
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function executeDeleteCart(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    
    $this->forward404If(!$id);
    
    $cart = CartPeer::retrieveByPK($id);
    
    foreach ($cart->getCartArticles() as $cart_carticle)
    {
      $cart_carticle->setDeletedBy($this->getUser()->getId());
      $cart_carticle->delete();
      $cart_carticle->save();
    }
    
    $cart->setDeletedBy($this->getUser()->getId());
    $cart->delete();
    $cart->save();
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function addOneMonth($cartArt)
  {
    $mes = $cartArt->getUpdatedAt('m');
    $anio = $cartArt->getUpdatedAt('Y');
    $dia = $cartArt->getUpdatedAt('d');
    $mes++;
    if ($mes == '13')
    {
      $anio++;
      $mes = '01';
    }
    
    return $anio.'-'.$mes.'-'.$dia;         
  }
  
  function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0)
  {
    $date_r = getdate(strtotime($date));
    $date_result = date("Y-m-d H:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
    return $date_result;
  }
  
  public function executeIndexDesign(sfWebRequest $request)
  {
    
  }
  
  public function executeItemDesign(sfWebRequest $request)
  {
    
  }
  
  public function executePaymentList(sfWebRequest $request)
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    if($this->getUser()->isAuthenticated())
    {
      $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
      $this->movements = MovementCashboxPeer::getMovementsCartByClientId($promoter->getClientId());
    }
    else
    {
      $id_session = session_id();
      $this->movements = MovementCashboxPeer::getMovementsCartByIdSession($id_session);
    }
    
  }

  public function addClientToCart($cart_id, $session_id)
  {
    $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
    
    if(isset ($cart_id))
    {
      $cart = CartPeer::retrieveByPK($cart_id);
    }else
    {
      $cart = CartPeer::getCartByIdSession($session_id);
    }
    
    if(!$cart)
      return;
    
    $cart->setClientId($promoter->getClientId());
    $cart->save();
  }
  
  public function executeVaciarCarrito(sfWebRequest $request)
  {
    $cart_id = $request->getParameter('cart_id');
    
    $cart = CartPeer::retrieveByPK($cart_id);
    
    $this->forward404If(!$cart);
    
    foreach ($cart->getCartArticles() as $cart_article) 
    {
      $cart_article->delete();
      $cart_article->save();
    }
    
    $this->redirect('sophiaStore/shoppingCart');
  }
  
  public function executeLoginToStore(sfWebRequest $request)
  {
    $id_session = session_id();
  
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->form = new sfGuardFormSignin();
    
    $this->paymentInformatinoForm = new PaymentInformationForm();
    
    if ($request->isMethod('post'))
    {
      $data_signin = $request->getParameter('signin');
      $data_payment = $request->getParameter('payment_information');
      
      if(is_array($data_signin))
      {
        $this->form->bind($data_signin);
        if ($this->form->isValid())
        {
          $values = $this->form->getValues();
          $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

          $cart_id = $request->getParameter('cart_id');
          $this->addClientToCart($cart_id, $id_session);

          $redirect = $this->generateUrl('default', array('module' => 'sophiaStore',
                      'action' => 'loginToStore'));
          
          $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
          $carts = CartPeer::getActiveCarts($promoter->getClientId());
          
          if(count($carts) > 1)
          {
            $redirect = $this->generateUrl('default', array('module' => 'sophiaStore',
                      'action' => 'shoppingCart'));
          }
          $this->redirect($redirect);
        }
      }
      
      if(is_array($data_payment))
      {
        $this->paymentInformatinoForm->bind($data_payment);
        if ($this->paymentInformatinoForm->isValid())
        {
          if($this->getUser()->isAuthenticated())
          {
            $this->addClientToCart($id_session);            
          }
          
          $this->savePaymentInformation($request);
          $this->pay($request);
          
//          $params = array();
//          $params['from'] = sfConfig::get('app_mail_from');
//          $params['to'] = $mail->getMail();
//          $params['subject'] = $asunto;
//          $params['body'] = $mensaje;
//          $params['client_name'] = $client->__toString();
//          
//          MailSender::send(Variables::$MAIL_TYPE_PAY, $params);
          
          $redirect = $this->generateUrl('default', array('module' => 'sophiaStore',
                      'action' => 'paymentList'));
          $this->redirect($redirect);
        }
      }
    }
  }
  
  public function executeFormOfPayment(sfWebRequest $request) 
  {
    $this->categories = CategoryPeer::getActiveCategories();
    
    $this->form_of_payments = FormOfPaymentPeer::doSelect(new Criteria());
    
    $id = $request->getParameter('id_session');
    
//    $id_session = (empty($id))? session_id() : $id;
//    
//    $this->addClientToCart($id_session);
    
    if ($request->isMethod('post')) 
    {
      $this->pay($request);
      $redirect = $this->generateUrl('default', array('module' => 'sophiaStore',
                      'action' => 'paymentList'));
      $this->redirect($redirect);
    }
  }
  
  public function executePayExternalClient(sfWebRequest $request) 
  {
    $id_session = session_id();
    
    if ($request->isMethod('post')) 
    {
      if($this->getUser()->isAuthenticated())
      {
        $this->addClientToCart($id_session);
      }
      
      $this->pay($request);
    
      $redirect = $this->generateUrl('default', array('module' => 'sophiaStore',
                        'action' => 'paymentList'));
      $this->redirect($redirect);
    }
  }
  
  public function pay(sfWebRequest $request) 
  {
    if ($request->isMethod('post')) 
    {
      $con = Propel::getConnection();
      
      try 
      {
        $con->beginTransaction(); // start the transaction 
        
        $form_of_payment_id = Variables::$FORM_OF_PAYMENT_EFECTIVO; //$request->getParameter('form_of_payment');
        
        $payment_type = PaymentTypePeer::getByFormOfPaymentAndCurrency($form_of_payment_id, 2); // dolar
        
        // obtiene caja para el root sophia
        $cashbox = CashBoxPeer::getCashbox(1, null, $con);

        if (is_object($cashbox)) 
        {
          $id_session = session_id();

          $amount = CartPeer::getTotalAmountByIdSession($id_session);

          $cart = CartPeer::getCartByIdSession($id_session);

          if(!$cart)
          {  
            $this->getUser()->setFlash('error','No se pudo realizar su transaccion.');
            $con->rollBack();
            return;
          }
          $cart_id = $cart->getId();

          $this->saveArticlePromoter($cart);

          $this->cart_id = $cart_id;
          
          $movement_cashbox = MovementCashboxPeer::saveMovement($amount, $cashbox->getId(), $payment_type, $con);
          // guarda movimientos de caja pago
          $movement_cashbox_cart = MovementCashboxCartPeer::saveMovement($movement_cashbox->getId(), $cart_id, $con);

         
          $cart->setIdState(3); //cancelado
          $cart->setClosingTime(new DateTime());
          $cart->save();
          
          $this->getUser()->setFlash('notice','Su transaccion se ha realizado satisfactoriamente.');
        }

        $con->commit();
        
      } catch (exception $e) 
      {
        $con->rollback();
        throw $e;
      }
    }
  }
  
  private function saveArticlePromoter(Cart $cart) 
  {
    if(!$this->getUser()->isAuthenticated())
      return;
    
    $cart_articles = $cart->getCartArticles();
    $promoter = PromoterPeer::getPromoterByUserId($this->getUser()->getId());
    
    foreach ($cart_articles as $cart_article)
    {
      $article_attribute_type = ArticleAttributeTypePeer::getArticleAttributeTypeByCartArticleId(
              $cart_article->getId(), Variables::$ARTICLE_ATTRIBUTE_TYPE_DIAS_VIGENCIA);

      
      $article_promoter = new ArticlePromoter();
      $article_promoter->setIdState(2);
      $article_promoter->setPromoterId($promoter->getId());
      $article_promoter->setArticleId($cart_article->getArticle()->getId());
      $article_promoter->setFromDate(new DateTime());
      $article_promoter->setToDate(new DateTime());
      
      $article_attribute = ArticleAttributePeer::getArticleAttributeByCartArticleId($cart_article->getId(), Variables::$ARTICLE_ATTRIBUTE_TYPE_DIAS_VIGENCIA);

      if(isset ($article_attribute_type) && isset ($article_attribute))
      {
        $days = (int)$article_attribute->getName();
        $to_date = $this->dateadd(date("Y-m-d H:i:s"), $days, 0, 0, 0, 0, 0);

        $article_promoter->setToDate($to_date);
      }
      
      $article_promoter->save();
      
    }
  }
  
  public function savePaymentInformation(sfWebRequest $request)
  {
    $payment_information = $request->getParameter('payment_information');
    
    $first_name= $payment_information['first_name'];
    $last_name= $payment_information['last_name'];
    $number = $payment_information['number'];
    $cvv_code = $payment_information['cvv_code'];
    $address = $payment_information['address'];
    $mail = $payment_information['email'];
    $document = $payment_information['document'];
    $comments = $payment_information['comment'];
    $mes = $request->getParameter('mes');
    $anio = $request->getParameter('anio');
    $user_name = $this->getUser()->isAuthenticated() ? $this->getUser()->getUserName() : "";
    
    $mail_object = new Mail();
    $mail_object->setMail($mail);
    $mail_object->setIdState(2);
    $mail_object->setMailTypeId(1);
    $mail_object->save();
    
    $client = new Client();
    $client->setFirstName($first_name);
    $client->setLastName($last_name);
    $client->setIdState(2);
    $client->save();
    
    $client_mail = new ClientMail();
    $client_mail->setIdState(2);
    $client_mail->setClientId($client->getId());
    $client_mail->setMailId($mail_object->getId());
    $client_mail->save();
    
    $identity_document = new IdentityDocument();
    $identity_document->setIdState(2);
    $identity_document->setIdentityDocumentTypeId(1);
    $identity_document->setNumber($document);
    $identity_document->save();
    
    $time = mktime(0, 0, 0, $mes, 1, $anio);
    $date = date('Y-m-d H:i:s', $time);
    
    $payment_inf = new PaymentInformation();
    $payment_inf->setNumber($number);
    $payment_inf->setCvvCode($cvv_code);
    $payment_inf->setClientId($client->getId());
    $payment_inf->setComment($comments);
    $payment_inf->setAddress($address);
    $payment_inf->setUserName($user_name);
    $payment_inf->setIdentityDocumentId($identity_document->getId());
   // $payment_inf->setDate($date);
    $payment_inf->save();
    
  }
  
  public function executePayMethods(sfWebRequest $request)
  {
    
  }
  
  public function executeProcesarPago()
  {  
    $this->amount = $this->getRequestParameter('amount');    
    $this->form_of_payment_id = $this->getRequestParameter('form_of_payment_id');    
    $this->pay_concept = PayConceptPeer::retrieveByPK($this->getRequestParameter('pay_concept_id'));
    
    $cart_id = $this->getRequestParameter('cart_id');
    
    $cart = CartPeer::retrieveByPK($cart_id);
    
    if($this->getRequestParameter('pay_concept_id') == Variables::$PAY_CONCEPT_CARRITO) //6=carrito
    {
      $this->cart_articles = $cart->getCartArticles();
    }
    
  }
}