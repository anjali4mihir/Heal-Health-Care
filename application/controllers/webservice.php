<?php 
	//1. Dashboard Screen
	/* https://prdshop.asteronline.com/wcs/resources/store/20000/mobile_espot/
		aom_app_homeslider_01 
		aom_app_homebanner_01
		AOM_HOMEPAGE_BESTSELLER
		AOM_HOMEPAGE_TRENDING
		aom_app_brandlist
		aom_app_offerlist
		aom_app_popularcategory
		aom_app_healthlibrary
		aom_app_singlebanner
		aom_app_video
	*/
	

	$root_direc = dirname(__FILE__);
	$uat_log_file_dir = '/opt/lampp/logs/live/';
	

	$log_file_dir = './log/';
	$log_file_dir = '/opt/lampp/logs/live/';
	$log_name = "aom_apigateway_";
	$log_ext = ".log";
	
	$upload_dir = "./upload/";
	$upload_dir_new = "";
	
	$uploadPath = dirname(__FILE__)."/upload/";
	
	// $uploadPathDir = "http://162.144.51.250/~therapy/AsterOnline/api/upload/";
	$uploadPathDir = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/aster/api/upload/";

	// $uploadPathDirNew = "https://asteronline.com/mobile-apis/uat/upload/";
	$uploadPathDirNew = "https://asteronline.com/mobile-apis/live/upload/";
	
	// $BaseHost = "https://uatshop.asteronline.com/"; 
	$BaseHost =  "https://asteronline.com/";
    $BaseRequest = "https://"; 

	$order_details_URL = $BaseHost."wcs/resources/store/20000/aom_orders/history?orderId=";
	
	$sendEmailVerification = $BaseHost."wcs/resources/store/20000/person_info/validate_email/";

	$discard_prescription = $BaseHost."webapp/wcs/stores/servlet/aom-update-prescription-status?status=cancel&memberId=";

	// {mobileNo_without(+971)}

	$newProductDisplay = $BaseHost."wcs/resources/store/20000/mobile_espot/AOM_HOMEPAGE_NEW_LAUNCH";

	$sendOTPVerification = $BaseHost."wcs/resources/store/20000//person_info/send_otp/";

	$Dashboard_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/aom_app_homeslider_01,aom_app_homebanner_01,AOM_HOMEPAGE_BESTSELLER,AOM_HOMEPAGE_TRENDING,aom_app_brandlist,aom_app_offerlist,aom_app_popularcategory,aom_app_healthlibrary,aom_app_singlebanner,aom_app_video";

	$recent_view_URL = $BaseHost."wcs/resources/store/20000/espot/AOM_CART_RECENTLYVIEWED";
	
	$recommendation_product_URL = $BaseHost."wcs/resources/store/20000/espot/AOM_CART_RECOMMENDATIONS";

	$productSummary_Url = $BaseHost."search-m-app/resources/store/20000/productview/byIds?profileName=CEBS_findProductByIds_WithSellerInfoSummary&responseFormat=json&";//id=100501

	function ThumbPath($type, $dirPath){
		
		$imgCompletePath = "";
		
		$dirArr = preg_split("/\//", $dirPath);
		$fileName = end($dirArr);
		
		if($type == "banner"){
			$imgCompletePath = "https://cdn.asteronline.com/media/images/content/".$fileName;
		}else if($type == "product"){
			$imgCompletePath = "https://cdn.asteronline.com/media/images/products/".$fileName;
		}else if($type == "category"){
			$imgCompletePath = "https://cdn.asteronline.com/media/images/content/".$fileName;
		}
		
		return $imgCompletePath;
	}
	
//2. Category List Screen
	$category_Url = $BaseHost."search-m-app/resources/store/20000/categoryview/@top";
	
	$delivery_Url = $BaseHost."wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_pdp";
	
//3. Category View Screen
	
	//3.a Category View Top Slider
	//https://prdshop.asteronline.com/wcs/resources/store/20000/mobile_espot/{categoryIdentifier}_CategoryEMS_MAPP // categoryIdentifier =>identifier
	$catViewTopSlider_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/";//AOM_001_CategoryEMS_MAPP
	
	//3.b Category view
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/categoryview/byParentCategory/{CategoryId} /// CategoryId =>uniqueID
	$catViewSubCategory_Url = $BaseHost."search-m-app/resources/store/20000/categoryview/byParentCategory/"; //47552
	
	//3.c Brand List
	$catViewBrand_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/aom_app_brandlist";
	
	//3.d Top Deals
	$catViewTopDeals_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/AOM_HOMEPAGE_BESTSELLER";
	
	//3.e Product List 
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/productview/byCategory/47551?profileName=CEBS_findProductsByCategory_WithSellerInfo&searchType=1000&searchSource=E
	$catViewProductList_Url = $BaseHost."search-m-app/resources/store/20000/productview/byCategory/";
	
	$catViewProductList_Url_filter = $BaseHost."search-m-app/resources/store/20000/productview/byCategory/";
	//  47551 /// ?profileName=CEBS_findProductsByCategory_WithSellerInfo&searchType=1000&searchSource=E
	
//4. Product Details

	//4.a productview byid
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/productview/byId/119508?profileName=CEBS_findProductByIds_Details_WithSellerInfoSummary
	$ProductDetail_Url = $BaseHost."search-m-app/resources/store/20000/productview/byId/"; //119508  //?profileName=CEBS_findProductByIds_Details_WithSellerInfoSummary
	
	$cssLink1 = $BaseHost."wcsstore/CEBSMarketplaceHub/css/common1_1.css";
	$cssLink2 = $BaseHost."wcsstore/CEBSMarketplaceHub/css/styles.css";
	
	//4.b Product Tired Price
	//https://prdshop.asteronline.com/wcs/resources/20426/getTiredPrice/119508
	//https://prdshop.asteronline.com/wcs/resources /{sellerStoreId}/getTiredPrice/{productId}
	$ProductTiredPrice = $BaseHost."wcs/resources/";// 20426/getTiredPrice/119508"
	
	//4.c Product delivery information
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_pdp?sellerStoreId=20426&startDate=2019-11-27&shippingMode=Standard&deliveryCity=Bur%20Dubai&startTime=09:00
	$ProductDeliveryInfo = $BaseHost."wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_pdp?";
	
	
	//4.d Product tag 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/page?langId=-1&q=byCatalogEntryIds&catalogEntryId=119508
	$ProductTags = $BaseHost."wcs/resources/store/20000/page?langId=-1&q=byCatalogEntryIds&catalogEntryId=";
	
	//4.e Simillar Product 
	$ProductSimilarProduct = $BaseHost."wcs/resources/store/20000/mobile_espot/AOM_PDP_Similar_Products";
	
	$similarProduct_new = $BaseHost."wcs/resources/store/20000/espot/AOM_PDP_Similar_Products";
	
	//4.f Product Review
	//http://readservices-b2c.powerreviews.com/m/622304/l/en_AE/product/{productPartNumber}/reviews?apikey=26ad88ee-e43d-42ca-bf38-f8ce7061d574
	//http://readservices-b2c.powerreviews.com/m/622304/l/en_AE/product/AOM100000059/reviews?apikey=26ad88ee-e43d-42ca-bf38-f8ce7061d574
	$ProductReview_Url = "http://readservices-b2c.powerreviews.com/m/622304/l/en_AE/product/";//AOM100000059/reviews?apikey=26ad88ee-e43d-42ca-bf38-f8ce7061d574";
	
	
//5. Registration 
	/*
	https://prdshop.asteronline.com/aom-standard-user-registration?
	firstname		  = Test&
	lastname		  = Test&
	Phone			  = 500345123&
	email			  = testmylocal@gmail.com&
	password		  = hello123&
	confirmpassword	  = hello123&
	dob				  = 1991-01-01&
	gender			  = M
	country			  = United%20Arab%20Emirates&
	isSocialLogin	  = false&
	mobileCountryCode = +971&
	*/
	$registration_Url = $BaseHost."aom-standard-user-registration?";
	
	$new_registration_Url = $BaseHost."wcs/resources/store/20000/person_info/register";
		
	
//6. Login
	$login_Url = $BaseHost."wcs/resources/store/20000/loginidentity";
	$loggedUserDetails_Url = $BaseHost."wcs/resources/store/20000/person/@self";

// 00 6. Auto login with only email for social login
	$autologin_Url = $BaseHost."wcs/resources/store/20000/loginidentity";

//7. Logout
	$logout_Url = $BaseHost."wcs/resources/store/20000/loginidentity/@self";

//8 Add to cart
	//https://prdshop.asteronline.com/wcs/resources/store/{sellerStoreId}/cart?responseFormat=json
	$addToCart_Url = $BaseHost."wcs/resources/store/"; //{sellerStoreId}/cart?responseFormat=json

//9. Get Cart view List 
	$cartView_Url = $BaseHost."wcs/resources/store/20000/cart/@self?sortOrderItemBy=orderItemID";
	//$cartOrderSummary_Url = $BaseHost."wcs/resources/store/20000/cart/@self?sortOrderItemBy=orderItemID";
	
//10. Update Item QTY from cart
	//https://prdshop.asteronline.com/wcs/resources/store/20000/cart/@self
	$cartItemUpdate_Url = $BaseHost."wcs/resources/store/20000/cart/@self";
	
//11. Delete item from cart 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/cart/@self/delete_order_item?storeId=20000&catalogId=15050&langId=-1&orderId=.&calculationUsage=-1%2C-2%2C-5%2C-6%2C-7&check=*n&calculateOrder=1&orderItemId={orderItemId} 
	$cartItemDelete_Url = $BaseHost."wcs/resources/store/20000/cart/@self/delete_order_item?storeId=20000&catalogId=15050&langId=-1&orderId=.&calculationUsage=-1%2C-2%2C-5%2C-6%2C-7&check=*n&calculateOrder=1&orderItemId=";
	

	//12. (a) Get Country
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_jurisdictions
	$countryList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions";
	
	//(b) Get Nationality 
	$nationalityList_Url = $BaseHost."wcs/resources/store/20000/country/country_state_list?langId=-1";
	//https://prdshop.asteronline.com/wcs/resources/store/20000/country/country_state_list?langId=-1
	
	//13. Get State 
	$stateList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?&country=";
	
	//14. Get State 
	$cityList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?&country=";

	//14. Get All City
	$GetcityList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions";

	// for prescription 
	$GetActive_cityList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?langId=-1&findBy=byActivePharmacies";	

	
	
	$ActivecountryList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?langId=-1&findBy=byActivePharmacies";
	$ActivestateList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?langId=-1&findBy=byActivePharmacies&country=";
	$ActivecityList_Url = $BaseHost."wcs/resources/store/20000/aom_jurisdictions?langId=-1&findBy=byActivePharmacies&country=";


	

//15. Apply Promo Code
	$applyCode_Url = $BaseHost."wcs/resources/store/20000/cart/@self/assigned_promotion_code?responseFormat=json";
	

//16. Remove Promo Code
	//https://prdshop.asteronline.com/wcs/resources/store/20000/cart/@self/assigned_promotion_code/{promoCode}
	$removeCode_Url = $BaseHost."wcs/resources/store/20000/cart/@self/assigned_promotion_code/";


//17. Address List 
	$addressListold__Url = $BaseHost."wcs/resources/store/20000/cart/@self/usable_shipping_info";

	$addressList_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/";
	
	//Getting Address Details
	//https://prdshop.asteronline.com/wcs/resources/store/20000/person/@self/contact/byAddressId/{addressId}
	$addressDetail_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/byAddressId/";//{addressId}

//18. Add Address 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/person/@self/contact/
	$addressAdd_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/";
	
	
//19. Edit Address 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/person/@self/contact/{NickName}
	//https://prdshop.asteronline.com/wcs/resources/store/20000/person/@self/contact/byAddressId/{addressId}
	$addressEdit_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/";


//20. Delete Address 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/person/@self/contact/{NickName}
	$addressDelete_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/";

//21. Cartview Shipment 
	$ShipmentAddress_Url = $BaseHost."wcs/resources/store/20000/cart/@self/usable_shipping_info";
	$ShipmentAddressDetail_Url = $BaseHost."wcs/resources/store/20000/person/@self/contact/byAddressId/";

	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order?orderNo={orderId}
	$ShipmentEstimateDelivery_Url = $BaseHost."wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order?orderNo=";

	$ShipmentOrderSummary_Url = $BaseHost."wcs/resources/store/20000/cart/@self";
	
	$ShipmentDeliverySlot_Url = $BaseHost."wcs/resources/calendarInfo/20000/slotDetails";


//22. Select Delivery Address/Update order with new addressId or Shipping Partner selection / Update Ship Charge API
	//Whenever any address change like edit or add address happens, or user select different address from list then you need to call this API to update new address id in current order.
	
	$deliveredAddress_Url = $BaseHost."wcs/resources/store/20000/cart/@self/shipping_info";


	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order?orderNo={orderId}
	$ShippingEstimateDelivery_Url = $BaseHost."wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order?orderNo=";
	
	//https://prdshop.asteronline.com/wcs/resources/store/{storeId}/cart/@self/shipping_info
	$ShipmentPartnerSelection_url = $BaseHost."wcs/resources/store/";
	
	
//23. Notes for Aster / Seller / Shipping Partner
	//https://prdshop.asteronline.com/AOMUpdateOrderExtAtrAjaxCmd?storeId=20000&langId=-1&catalogId=15050&attrName=CUSTOMER_COMMENT&attrValue={Notes given by user}&orderId={orderID}

	$AddUpdateAsterNote_Url = $BaseHost."AOMUpdateOrderExtAtrAjaxCmd?storeId=20000&langId=-1&catalogId=15050&attrName=CUSTOMER_COMMENT&";

	$selectPaymentType_Url = $BaseHost."AOMUpdateOrderExtAtrAjaxCmd?storeId=20000&langId=-1&catalogId=15050&";

	$precheckoutURL = $BaseHost."wcs/resources/store/20000/cart/@self/precheckout";

	

//24.Cartview Shipment Address Validation for order / Address Validation for order
	//https://prdshop.asteronline.com/AddressValidation?shipmentType=1&catalogId=15050&langId=-1&storeId=20000&shippingAddressId={addressId}
	$cartviewShipmentValidation_Url = $BaseHost."AddressValidation?shipmentType=1&catalogId=15050&langId=-1&storeId=20000&shippingAddressId=";
	
	
//25. Cartview Payment or Order Prepare API	
	
	$cartviewOrderPrepare_Url = $BaseHost."wcs/resources/store/20000/cart/@self/precheckout";
	
	$cartviewPaymentOrderSummary_Url = $BaseHost."wcs/resources/store/20000/cart/@self";
	
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aster_secure/get_user?mobile={registeredMobileNumber}
	$cartviewPaymentAsterPoint_Url = $BaseHost."wcs/resources/store/20000/aster_secure/get_user?mobile=";
	
	
//26. (a) Add Payment Method API

	$AddPaymentMethod_Url = $BaseHost."wcs/resources/store/20000/cart/@self/payment_instruction";
	
//26. (b) Add Payment Method API

	$RemovePaymentMethod_Url = $BaseHost."wcs/resources/store/20000/cart/@self/payment_instruction/";
	
	
//27. Cart review	
	
	

//28. Cart checkout
	$cartviewCheckout = $BaseHost."wcs/resources/store/20000/cart/@self/checkout";


//29. Brand View 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/mobile_espot/{brandName}_BrandEMS_MAPP
	$brandViewBanner_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/";

	// https://prdshop.asteronline.com/search-m-app/resources/store/20000/productview/bySearchTerm/*?manufacturer={BrandName}&profileName=CEBS_findProductsBySearchTerm_WithSellerInfoSummary
	$brandView_Url = $BaseHost."search-m-app/resources/store/20000/productview/bySearchTerm/*?manufacturer=";//{BrandName}&profileName=CEBS_findProductsBySearchTerm_WithSellerInfoSummary
	
//30. Offer list 

	$offerList_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/aom_app_offerlist";
	
	
//31 Health Library	

	$healthLibraryList_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/aom_app_healthlibrary";
	

// 32. Update Profile
	
	$updateProfile_Url = $BaseHost."wcs/resources/store/20000/person/@self";
	$updateAlternate_Number_Url = $BaseHost."wcs/resources/store/20000/person/@self?responseFormat=json";
	
//33. Forget Password	
	//https://prdshop.asteronline.com/webapp/wcs/stores/servlet/PersonChangeServicePasswordForgottenReset?challengeAnswer=-&storeId=20000&catalogId=15050&langId=-1&state=passwdconfirm&URL=/&authToken=&flag=true&logonId={email/logonId}&aomlogonId={email/logonId}
	$forgetPassword_Url = $BaseHost."webapp/wcs/stores/servlet/PersonChangeServicePasswordForgottenReset?challengeAnswer=-&storeId=20000&catalogId=15050&langId=-1&state=passwdconfirm&URL=/&authToken=&flag=true&logonId=";//{email/logonId}&aomlogonId={email/logonId}";
	
//34. Forget Password	

	$changePassword_Url = $BaseHost."wcs/resources/store/20000/person/@self";

//35. Search Suggestion
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/sitecontent/keywordSuggestionsByTerm/*?langId=-1&searchTerm={nive}&catalogId=15050
	$searchSuggestionKeyword_Url = $BaseHost."search-m-app/resources/store/20000/sitecontent/keywordSuggestionsByTerm/*?langId=-1&catalogId=15050&searchTerm=";
	
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/productview/bySearchTerm/*?searchSource=Q&catalogId=15050&responseFormat=json&langId=-1&profileName=IBM_findProductsByNameOnly&intentSearchTerm=nivea&searchTerm=nivea
	$searchSuggestionKeywordEntry_Url = $BaseHost."search-m-app/resources/store/20000/productview/bySearchTerm/*?searchSource=Q&catalogId=15050&responseFormat=json&langId=-1&profileName=IBM_findProductsByNameOnly&intentSearchTerm=";//nivea&searchTerm=nivea
	
	
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/sitecontent/productSuggestionsBySearchTerm/*?searchTerm=nivea&pageSize=4&catalogId=15050&pageNumber=1&langId=-1&responseFormat=json
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/sitecontent/productSuggestionsBySearchTerm/*?pageSize=4&catalogId=15050&pageNumber=1&langId=-1&responseFormat=json&searchTerm=nivea
	$searchSuggestionProduct_Url = $BaseHost."search-m-app/resources/store/20000/sitecontent/productSuggestionsBySearchTerm/*?pageSize=4&catalogId=15050&pageNumber=1&langId=-1&responseFormat=json&searchTerm=";
	
	$searchSuggestedBrand_Url = $BaseHost."search-m-app/resources/store/20000/sitecontent/brandSuggestions?responseFormat=json&Accept=application/json&catalogId=15050&langId=-1";
	
//36. Search Result
	
	//https://prdshop.asteronline.com/search-m-app/resources/store/20000/productview/bySearchTerm/*?searchSource=Q&catalogId=15050&responseFormat=json&profileName=CEBS_findProductsBySearchTerm_WithSellerInfoSummary&intentSearchTerm={suggestionView[0].entry.term}&searchTerm={suggestionView[0].entry.term}&categoryId={facetView.entry.extendedData.uniqueId }
	$searchResult = $BaseHost."search-m-app/resources/store/20000/productview/bySearchTerm/*?searchSource=Q&catalogId=15050&responseFormat=json&profileName=CEBS_findProductsBySearchTerm_WithSellerInfoSummary&intentSearchTerm=";//{suggestionView[0].entry.term}&searchTerm={suggestionView[0].entry.term}&categoryId={facetView.entry.extendedData.uniqueId }


//37. Brand List 
	$brandList_Url = $BaseHost."search-m-app/resources/store/20000/sitecontent/brandSuggestions";


//38. Seller List 
	$sellerList_Url = $BaseHost."wcs/resources/store/20000/marketplace/seller_prices?page_size=25&langId=-1&page_no=1&profileName=seller_prices&currency=AED";


//39. Seller view 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/productview/bySearchTerm/*?facet={store_id}&profileName=CEBS_findProductsBySearchTerm_WithSellerInfoSummary
	$sellerView_Url = $BaseHost."wcs/resources/store/20000/productview/bySearchTerm/*?facet=";


//40. Aster Secure Point 
	//https://uatshop.asteronline.com/wcs/resources/store/20000/aster_secure/get_user?mobile={registeredMobileNumber}
	$asterSecure_url = $BaseHost."wcs/resources/store/20000/aster_secure/get_user?mobile=";
	
	$asterSecureHistory_url = $BaseHost."wcs/resources/store/20000/aster_secure/get_transaction?mobile=";



//42.  Health Library Detail
	//https://prdshop.asteronline.com/wcs/resources/store/20000/mobile_espot/AOM_HairCare_HealthLibraryDetail
	$healthLibraryDetails_Url = $BaseHost."wcs/resources/store/20000/mobile_espot/";

//Phase 2.
	
//42. Create wish list	
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/
	$wishListCreationUrl = $BaseHost."wcs/resources/store/20000/wishlist/";
	
	
	
	
//43. Wish list	
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/@self
	$wishListDataUrl = $BaseHost."wcs/resources/store/20000/wishlist/@self";
	
	
	
//44. Wish list	Update
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/{externalId}
	$wishListUpdateUrl = $BaseHost."wcs/resources/store/20000/wishlist/";
	
	
//45. Wish list	Delete
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/{externalId}
	$wishListDeleteUrl = $BaseHost."wcs/resources/store/20000/wishlist/";



//46. Wish list	default 
	$wishListdefaultUrl = $BaseHost."wcs/resources/store/20000/wishlist/@default";

//47. Wish list	Single 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/76504
	$wishListsingleUrl = $BaseHost."wcs/resources/store/20000/wishlist/";

//48. Wish list	Add Product 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/{externalId}?addItem=true
	$wishListAddProductUrl = $BaseHost."wcs/resources/store/20000/wishlist/";


//49. Wish list	Delete Product 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/wishlist/{externalId}?itemId={giftListItemId}
	$wishListDeleteProductUrl = $BaseHost."wcs/resources/store/20000/wishlist/";
	
	
//50. Order History Summary
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_orders/history?pageSize=1000&pageNo=1&userId={userId}
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_orders/history?pageSize=1000&pageNo=1&userId=891623
	
	// $OrderHistroySummaryUrl = $BaseHost."wcs/resources/store/20000/aom_orders/history?pageSize=100&pageNo=1&userId=";//891623
	$OrderHistroySummaryUrl = $BaseHost."wcs/resources/store/20000/aom_orders/history?pageSize=20&pageNo=1&userId=";//891623
	
//51. Order History Details
	//https://prdshop.asteronline.com/wcs/resources/store/20000/order/{orderId}?accessProfile=IBM_Details&sortOrderItemBy=orderItemID
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/history?orderId=10906054&pageSize=1&pageNo=1
	$OrderDetailsUrl = $BaseHost."wcs/resources/store/20000/order/";//{orderId}?accessProfile=IBM_Details&sortOrderItemBy=orderItemID
	
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/history?orderId=10906054&pageSize=1&pageNo=1
	$OrderDetails2Url = $BaseHost."wcs/resources/store/20000/aom_orders/history?pageSize=1&pageNo=1&orderId=";
	
	
//52. Invoice Download.
	//https://prdshop.asteronline.com/generate-orderSummarydetail-pdf?orderId={orderID}
	$OrderInvDownload = $BaseHost."generate-orderSummarydetail-pdf?orderId=";
	

//53. Cancel Order return reasons
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/order_cancel_rtn_reasons?orderId=10865092&queryType=CANCEL&languageId=-1
	$OrderCancelReturnReasonsDownload = $BaseHost."wcs/resources/store/20000/aom_orders/order_cancel_rtn_reasons?queryType=CANCEL&languageId=-1&orderId=";//10865092

	$OrderItemCancelReturnReasonsUrl = $BaseHost."wcs/resources/store/20000/aom_orders/order_cancel_rtn_reasons?";//10865092
	
	$OrderItemCancelReturnTimeSlotUrl = $BaseHost."wcs/resources/store/20000/aom_orders/get-return-pickup-slots";


//54. Cancel Order
	//https://uatshop.asteronline.com/AOMOrderCancelAJAX?storeId=20000&catalogId=15050&langId=-1&orderId=50010269021&orderCancelReason=100005
	$OrderCancel = $BaseHost."AOMOrderCancelAJAX?storeId=20000&catalogId=15050&langId=-1&";
	
	///* { "message": "The order is not in a state for cancellation.", "orderCancelReason": ["100005"], "isCanceled": false, "catalogId": ["15050"], "errorCode": "AOMRTN100", "langId": ["-1"], "isError": true, "storeId": ["20000"], "orderId": ["10732070"] } */
	
	
//55. Cancel Order item.
	//https://uatshop.asteronline.com/AOMOrderItemCancelAJAX?storeId=20000&catalogId=15050&langId=-1&orderId=50010269020&orderItemId=4145050&orderCancelReason=100005
	$OrderItemCancel = $BaseHost."AOMOrderItemCancelAJAX?storeId=20000&catalogId=15050&langId=-1&";


// 56. compare product use product details		
	
//57. Emirates
	//https://uatshop.asteronline.com/wcs/resources/cmpgeonode/STAT?profile=Fetch_CmpGeoNode_Details_Summary&responseFormat=json
	//https://asteronline.com/wcs/resources/cmpgeonode/STAT?profile=Fetch_CmpGeoNode_Details_Summary&responseFormat=json
	
	$EmiratesList = $BaseHost."wcs/resources/cmpgeonode/STAT?profile=Fetch_CmpGeoNode_Details_Summary&responseFormat=json";
	
	

//58. Upload File 
	$UploadFileUrl = $BaseHost."webapp/wcs/stores/servlet/cmp-create-document-entry";	
	
	
//59. Create prescription 
	$PrescriptionCreateUrl = $BaseHost."webapp/wcs/stores/servlet/aom-upload-prescription-form";
		

	
//60. Prescription Address list

	//https://asteronline.com/wcs/resources/aomPresAddress/11677270?profile=Fetch_Prescription_Address_Summary&rxFormId=620&responseFormat=json
	$PrescriptionAddressList = $BaseHost."wcs/resources/aomPresAddress/";
	
	
//61. Prescription Address Add/Upadte
	//https://asteronline.com/webapp/wcs/stores/servlet/aom-update-prescription-address
	
	$PrescriptionAddressAddUpdate = $BaseHost."webapp/wcs/stores/servlet/aom-update-prescription-address";
	
//62. Prescription Address Delete

	$PrescriptionAddressDelete = $BaseHost."webapp/wcs/stores/servlet/aom-prescription-address-remove";
	

	$DeleteInsuranceCard = $BaseHost."webapp/wcs/stores/servlet/cmp-update-document-entry-status?docMgrId=";

	
//63. Prescription Address Selection

	$PrescriptionAddressSelection = $BaseHost."webapp/wcs/stores/servlet/aom-update-prescription-address";

//64. Prescription Address Selection

	$PrescriptionAddressConfirmation = $BaseHost."webapp/wcs/stores/servlet/aom-upload-prescription-delivery-options";


//65. Prescription review 
	//https://asteronline.com/wcs/resources/aomPresDetails/{memberId}?rxFormId=&orderId=&profile=Fetch_Prescription_Details_Summary&responseFormat=json
	
	$PrescriptionReview = $BaseHost."wcs/resources/aomPresDetails/";
	
//66. Prescription Order Create

	$PrescriptionOrderCreate = $BaseHost."webapp/wcs/stores/servlet/aom-prescription-order-sync";

	// https://uatshop.asteronline.com:443/wcs/resources/store/20000/aom_prescription_order_sync/create_rxo_order?mebmerId=372201&rxFormId=2261

	$PrescriptionOrderCreateNew = $BaseHost."wcs/resources/store/20000/aom_prescription_order_sync/create_rxo_order?";
	



//67. Prescription Pending 

	$PrescriptionCheckPending = $BaseHost."wcs/resources/aomGetPresDetails/";//?status=0&profile=Fetch_Prescription_Details_By_Status_Summary&responseFormat=json 


//68. Guest Login 
	//https://prdshop.asteronline.com/wcs/resources/store/20000/guestidentity
	$GuestUserLogin = $BaseHost."wcs/resources/store/20000/guestidentity";
	
	
//69. Reorder 
	//https://asteronline.com/wcs/resources/store/20000/order/byStatus/N,M,A,B,C,R,S,D,F,G,L,X?pageSize=5&pageNumber=1
	
	$ReOrderList = $BaseHost."wcs/resources/store/20000/order/byStatus/N,M,A,B,C,R,S,D,F,G,L,X?pageSize=5&pageNumber=1";
	
	//https://prdshop.asteronline.com/wcs/resources/store/20000/order/{orderId}?accessProfile=IBM_Details&sortOrderItemBy=orderItemID
	$ReOrderItemListUrl = $BaseHost."wcs/resources/store/20000/order/";//{orderId}?accessProfile=IBM_Details&sortOrderItemBy=orderItemID
		
		
//70. Send OTP to Mobile No.
			
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/verify_guest_order?orderId={ordreId}&mobile={countryCode}%20-%20{mobileNumber}&action=validateOrder
	$SendOTPMobile = $BaseHost."wcs/resources/store/20000/aom_orders/verify_guest_order?";//orderId={ordreId}&mobile={countryCode}%20-%20{mobileNumber}&action=validateOrder


//71. Validating OTP
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/verify_guest_order?orderId={ordreId}&mobile={countryCode}%20-%20{mobileNumber}&otp={OTP}& action=validateOtp 
	
	$ValidateOTP = $BaseHost."wcs/resources/store/20000/aom_orders/verify_guest_order?";//orderId={ordreId}&mobile={countryCode}%20-%20{mobileNumber}&otp={OTP}&action=validateOtp ";


//72. Trcking Order Details
	//https://asteronline.com/wcs/resources/store/20000/aom_orders/history?orderId={orderId}&pageSize=1&pageNo=1
	$trackOrderDetails = $BaseHost."wcs/resources/store/20000/aom_orders/history?pageSize=1&pageNo=1&orderId=";//{orderId}
	
	
//73. Return Order 
	//https://uatshop.asteronline.com/AOMOrderItemReturnAjax?storeId=20000&catalogId=15050&langId=-1&orderId=50010269020&orderItemId=4145050&returnReasonId=100005&pickupSlotId=582
	$reurnOrderItems = $BaseHost."AOMOrderItemReturnAjax?storeId=20000&catalogId=15050&langId=-1&";


//75. Contact us 
	
	//https://uatshop.asteronline.com/AOMContactUsSendEmail?name=Test&email=testingcontactus%40yopmail.com&sub=Others&message=This+is+for+testing+contact+us&g-recaptcha-response=03AGdBq25gN_TF6r5qc08X_EtVpAUHpulDs-zKmmivLnJzsnNSlejXjlpuL_Z_8Qpd3DIIthrzyBsY5xqEGQm0fiZnPuKJMhfC7ZZeHgkMS4Vhkny0TQGAxqEZoCWwGFPe7E7fbhKLpf92Tb_UX2jh0BLF8Ogwq7GWZNgIPGG9-kZYqwfoO1qQ_HJ5KF7vdOewQSN-i1WB1z98NQZZlTsD9lbyGhO4ZY4t5bSSz3BnoNCJxn3Z_5uZ4WvZLZgO0KfpnQp7oHDukoMuei3_AaAn6WVswtu2ROWETfHYNWqovIACQaOLccpGjOfSv8b5eX6cRWY2fe4jpSoAmXM7tYKwiHIeyt4Kf7kFGR3gAQzPh61nE360qaoBhAXlm5pd2cYMDyKmhD_nI-q7KR76GCp2sq8s8IMe_rieqTYHvhKmRtoUCbvXPz78ZJf6nu380U5XizooSi6NPRJm 
	
	//$ContactUs = $BaseHost."AOMContactUsSendEmail?";
	$ContactUs = $BaseHost."wcs/resources/store/20000/contactus/sendquerybymail";
	

//76. Retrieve Account
	//https://asteronline.com/aom-validate-secure-account?mobile=971552632399
	$retrieveAccount = $BaseHost."aom-validate-secure-account?mobile=";
	
	//Retrieve Account OTP Generate 

	$retrieveAccountOTPGenerate = $BaseHost."AOMSendOtpAjaxCmd?otpConf=AOM_RETRIVE_ACCOUNT_MOBILE&otpType=mobile&otpTo=";//971552632399
	
	
//77. 	Retrieve Account OTP Varification 
	
	//https://asteronline.com/AOMOtpValidateAjaxCmd?otpConf=AOM_RETRIVE_ACCOUNT_MOBILE&otp=1979&otpKey=971552632399
	$retrieveAccountOTPVarification = $BaseHost."AOMOtpValidateAjaxCmd?otpConf=AOM_RETRIVE_ACCOUNT_MOBILE&";//971552632399
	
	//Getting User Info 
	//https://asteronline.com/aom-validate-user-account?mobile=971552632399
	$userAccountInfo = $BaseHost."aom-validate-user-account?mobile=";
	
	//Sent reset password link on mail 
	//https://asteronline.com/aom-send-forgot-password-mail?emailid=aaaaaaaaaaa@yopmail.com
	$rASentPasswordLinkMail = $BaseHost."aom-send-forgot-password-mail?emailid=";
	
//78. Payment Request 
	//https://uatshop.asteronline.com/create-payment-order?orderId=11047041&storeId=20000&langId=-1
	
	$PaymentRequestInfo = $BaseHost."create-payment-order?storeId=20000&langId=-1&orderId=";//11047041
	
	$PaymentRequestInfoNew = $BaseHost."wcs/resources/store/20000/order_info/do_order_online_payment/";//11047041
	// https://uatshop.asteronline.com/wcs/resources/store/20000/order_info/do_order_online_payment/5000010001032


//79. Payment Status Update 
//https://uatshop.asteronline.com/wcs/resources/store/20000/aom_orders/process_payment_order
	//https://uatshop.asteronline.com/process-payment-order?orderId=11047041&ref=7f1f3f3a-0c76-4b56-a951-05b25713ec64&storeId=20000&langId=-1
	$PaymentStatusUpdate = $BaseHost."wcs/resources/store/20000/aom_orders/process_payment_order";//orderId=11047041&ref=7f1f3f3a-0c76-4b56-a951-05b25713ec64&



//80. Estimate Delivery Date --> Not used
	//https://prdshop.asteronline.com/wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order?orderNo={orderId}
	//$EstimateDeliveryDate = $BaseHost."wcs/resources/store/20000/aom_delivery_estimate/del_estimate_for_order";

//81. Estimate Delivery Date  Update

	//https://prdshop.asteronline.com/AjaxRESTUpdateOrderDeliverySlot?storeId=20000&orderId={orderId}&slotId={ CALSLOT_ID}&slotTypeId={slotTypeId}
	$EstimateDeliveryDateUpdate = $BaseHost."AjaxRESTUpdateOrderDeliverySlot";
	
//82. Send Order Confirmation on SMS or Email 
	//https://prdshop.asteronline.com/ResendOrderConfirmation?storeId=20000&langId=-1&catalogId=15050&orderId={orderId}&notifyType=phone&notifyTo={phoneNumber}
	//https://prdshop.asteronline.com/ResendOrderConfirmation?storeId=20000&langId=-1&catalogId=15050&orderId={orderId}&notifyType=email&notifyTo={emailID}

	$SendOrderConfirmation = $BaseHost."ResendOrderConfirmation?storeId=20000&langId=-1&catalogId=15050&";

	$SendOrderConfirmationNew = $BaseHost."wcs/resources/store/20000/order_info/resend_notification/";
	
	$PrescriptionSendOrderConfirmation = $BaseHost."/webapp/wcs/stores/servlet/resources/AOMResendPrescriptionOrderInfoCmd?";

//83. Check Social Login exists 
	//https://uatshop.asteronline.com/CEBSMPUserExistCmd?storeId=20000&langId=-1&logonId=dheerendra786@gmail.com&URL=
//	$CheckSocialLogin = $BaseHost."CEBSMPUserExistCmd?storeId=20000&langId=-1&URL=&logonId=";
	$CheckSocialLogin = $BaseHost."CEBSMPUserExistCmd?storeId=20000&langId=-1&logonId=";




	
	/*
	https://prdshop.asteronline.com/
	Aug.Test23@yopmail.com
	1qaz!QAZ
	
	test18@yopmail.com
	hello123
	
	atul.pratap@asteronline.com
	marketplace2020
	*/
?>
