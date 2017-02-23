angular.module('mycollegeApp.controllers', ['mycollegeApp.services'])
    .controller('mainCntrl', function ($rootScope, $scope,$state,$ionicPlatform,$window) {
   //      if(window.Connection) {
   //              if(navigator.connection.type == Connection.NONE) {

   // console.log("no internet")        
   //  Materialize.toast("Please check your internet connection", 4000)           
   //              }
   //              else{

   //              }
   //          }
  $scope.currState = $state;
        console.log("This one have some objects: ");   
        $scope.$watch('currState.current.name', function (newValue, oldValue) {
            console.log(newValue);
            $scope.currentstate = newValue;
        })
             $rootScope.myApp = $rootScope.myApp || (function () {
            var pleaseWaitDiv = $('#loadingDiv');
             return {
                    showPleaseWait: function () {
                        pleaseWaitDiv.show();
                    },
                    hidePleaseWait: function () {
                        pleaseWaitDiv.hide();
                    },

                };
            })();
            /*  LOADING Function */
     $rootScope.myApp.hidePleaseWait();
   //$rootScope.myApp.showPleaseWait();
   $ionicPlatform.registerBackButtonAction(function () {
        console.clear();
        console.log($state.$current.name);
    if (($state.$current.name == "login") || ($state.$current.name == "otp") ||($state.$current.name == "home")) {
            console.log('exit app');
            console.log($state.$current.name);
            navigator.app.exitApp();
        } else if($state.$current.name==''){
              $window.history.back();
            }            
        else if($state.$current.name == ""){
         $window.history.back();
        }
        else{
           $window.history.back();
        }
    }, 100);
    })
.controller('LoginCtrl', function($scope,urls,$state,toastr,$http,$window,$rootScope) {
console.log("in login controller")
  $scope.login=function(userdata){
       $rootScope.myApp.showPleaseWait();
            if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }

console.log(userdata)
  var loginReq={
              "requestMessage": "userRegister",
              "requestId": "001",
              "requestData": [
                {
                  "mobile_no": userdata
                  
                }
              ]
            }
console.log(JSON.stringify(loginReq))
console.log(urls.apiUrl+'user-controller.php?action=userRegister')
$http.post(urls.apiUrl+'user-controller.php?action=userRegister',loginReq)
    .success(function (data, status, headers, config) {
      console.log(data)
      $rootScope.myApp.hidePleaseWait()
               if(data.response=="success"){
               $scope.successmsg=data.resultData[0].message;
               $scope.mobileno=data.resultData[0].mobile_no;
               $state.go('otp',{mobileno:userdata})
              // toastr.success($scope.successmsg)
              Materialize.toast($scope.successmsg, 4000)
             }else{
              console.log("error")
                $scope.errormsg=data.resultData[0].message;
              // toastr.error("error")
              Materialize.toast($scope.errormsg, 4000)

             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              $rootScope.myApp.hidePleaseWait()
              });     
        }
})

.controller('verificationCtrl', function($scope,$window,$stateParams,urls,$state,toastr,$http,$localStorage,$rootScope) {
  console.log($stateParams.mobileno)
   var deviceid=$localStorage.uuid
var GcmRegId=$localStorage.GcmRegId
  $scope.sendotp=function(otp){
               if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }
            $rootScope.myApp.showPleaseWait();
console.log(otp)
  var otpReq={
                  "requestMessage": "userOTP",
                  "requestId": "002",
                  "requestData": [
                    {
                      "mobile_no": $stateParams.mobileno,
                        "otp":otp,
                        gcm_id :GcmRegId,
                        device_id:deviceid
                    }
                  ]
                }
console.log(JSON.stringify(otpReq))
console.log(urls.apiUrl+'user-controller.php?action=userOTP')
$http.post(urls.apiUrl+'user-controller.php?action=userOTP',otpReq)
    .success(function (data, status, headers, config) {
      console.log(data)
      $rootScope.myApp.hidePleaseWait()
               if(data.response=="success"){
               $scope.successmsg=data.resultData[0].message;
               $localStorage.student_id=data.resultData[0].student_id;
                 $localStorage.department_id=data.resultData[0].dept_id;
               $state.go('home')
              // toastr.success($scope.successmsg)
              Materialize.toast($scope.successmsg, 4000)
             }else{
              console.log("error")
              $scope.errormsg=data.resultData[0].message;
              // toastr.error("error")
               Materialize.toast($scope.errormsg, 4000)

             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              $rootScope.myApp.hidePleaseWait();
              });     
        }

})
.controller('homeCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$window,$rootScope) {
   //           if(window.Connection) {
   //              if(navigator.connection.type == Connection.NONE) {

   // console.log("no internet")        
   //  Materialize.toast("Please check your internet connection", 4000)           
   //              }
   //              else{

   //              }
   //          }
 
   $rootScope.myApp.showPleaseWait();
  var deptReq={
              "requestMessage": "deptList",
              "requestId": "003",
              "requestData": [
                {
                  "list": "department"
                
                }
              ]
            }
console.log(JSON.stringify(deptReq))
console.log(urls.apiUrl+'dept-controller.php?action=deptList')
$http.post(urls.apiUrl+'dept-controller.php?action=deptList',deptReq)
    .success(function (data, status, headers, config) {
      console.log(data)
       $rootScope.myApp.hidePleaseWait();
               if(data.response=="success"){
               $scope.deptlist=data.resultData[0].message;
             }else{
              console.log("error")
$scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
  $rootScope.myApp.hidePleaseWait();
              console.log(JSON.stringify(data))
              });     
        

})
.controller('newsCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$rootScope) {
  console.log($stateParams.dep_id);
  $scope.dep_id=$stateParams.dep_id;
  var newsReq={
              "requestMessage": "newsList",
              "requestId": "004",
              "requestData": [
                {
                  // "dept_id": "all",// if it has to display all the news of all the department 
                "dept_id": $scope.dep_id,// if u want to display the news list of a particular department
                "limit_from":"20",
                "limit_to":"30"
              }
              ]
            }
               $rootScope.myApp.showPleaseWait();
console.log(JSON.stringify(newsReq))
console.log(urls.apiUrl+'news-controller.php?action=newsList')
$http.post(urls.apiUrl+'news-controller.php?action=newsList',newsReq)
    .success(function (data, status, headers, config) {
      console.log(data)
      $rootScope.myApp.hidePleaseWait();
               if(data.response=="success"){
               $scope.newslist=data.resultData[0].message;
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              });     
})
.controller('newsdetailCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$window,$rootScope) {
  console.log($stateParams.news_id);
  var news_id=$stateParams.news_id;
  var newsReq={
                "requestMessage": "newsDetail",
                "requestId": "005",
                "requestData": [
                  {
                    "news_id":news_id// if it has to display all the news of all the department 
                }
                ]
              }
                 $rootScope.myApp.showPleaseWait();
console.log(JSON.stringify(newsReq))
console.log(urls.apiUrl+'news-controller.php?action=newsDetail')
$http.post(urls.apiUrl+'news-controller.php?action=newsDetail',newsReq)
    .success(function (data, status, headers, config) {
      console.log(data)
      $rootScope.myApp.hidePleaseWait();
               if(data.response=="success"){
               $scope.news=data.resultData[0];
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              $rootScope.myApp.hidePleaseWait();
              });     
        $scope.viewvideo=function(videolink){
// $state.go(videolink)
var youtubelink="https://www.youtube.com/watch?v="+videolink;
console.log(youtubelink)
window.open(youtubelink,'_blank');
        }

})
.controller('issuesCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$localStorage,$window,$rootScope) {
  // console.log($stateParams.news_id);
            if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }
  var student=$localStorage.student_id;
  var issueReq={
              "requestMessage": "issueList",
              "requestId": "006",
              "requestData": [
                {
                  "student_id": student
              }
              ]
            }
console.log(JSON.stringify(issueReq))
console.log(urls.apiUrl+'issue-controller.php?action=issueList')
$http.post(urls.apiUrl+'issue-controller.php?action=issueList',issueReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
               $scope.issuelist=data.resultData[0].message;
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              });     
        

})
.controller('issuesdetailCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$localStorage,$rootScope) {
  // console.log($stateParams.news_id);
  var issueid=$stateParams.iss_id;
  var student=$localStorage.student_id;
  // $scope.issuedeatil=function(issudeid){
      var issuedetReq={
                "requestMessage": "issueDetail",
                "requestId": "007",
                "requestData": [
                  {
                    "issue_id": issueid,
                  "student_id":student
                }
                ]
              }
console.log(JSON.stringify(issuedetReq))
console.log(urls.apiUrl+'issue-controller.php?action=issueDetail')
$http.post(urls.apiUrl+'issue-controller.php?action=issueDetail',issuedetReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
               $scope.issuedata=data.resultData[0];
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              });  
  // }
   
        

})
.controller('issuesaddCtrl', function($scope,$rootScope,$cordovaImagePicker,$stateParams,$window,urls,$state,toastr,$http,$localStorage) {
  // console.log($stateParams.news_id);
  // var issueid=$stateParams.iss_id;
  function convertImgToBase64URL(url, callback, outputFormat){
    var img = new Image();
    img.crossOrigin = 'Anonymous';
    img.onload = function(){
        var canvas = document.createElement('CANVAS'),
        ctx = canvas.getContext('2d'), dataURL;
        canvas.height = this.height;
        canvas.width = this.width;
        ctx.drawImage(this, 0, 0);
        dataURL = canvas.toDataURL(outputFormat);
        callback(dataURL);
        canvas = null; 
    };
    img.src = url;
}
  $scope.getImageSaveContact = function() {       
    var options = {
        maximumImagesCount: 10, // Max number of selected images, I'm using only one for this example
        width: 800,
        height: 800,
        quality: 80            // Higher is better
    };
$scope.collection={}
$rootScope.imagedata=[]; 
  $cordovaImagePicker.getPictures(options)
        .then(function (results) {
          console.log(results)
          $scope.imagelist=results;
            for (var i = 0; i < results.length; i++) {
                console.log('Image URI: ' + results[i]);
                $scope.imageUri = results[i];
                console.log($scope.imageUri)    
 convertImgToBase64URL(results[i], function(base64Img){
                        // console.log(dataimg[1]) ;   
                        $rootScope.imagedata.push({
                           image:base64Img
                        })                             
                    });                          

               // window.plugins.Base64.encodeFile(results[0], function(base64){
               //    // Save images in Base64
               //    console.log(JSON.stringify(base64))
               //    $rootScope.imagedata.push({
               //      image:base64
               //    })
               //    console.log($rootScope.imagedata)
               // });
            }
            // console.log($rootScope.imagedata)
        }, function(error) {
            // error getting photos
        });

}

  var student=$localStorage.student_id;
  var dept_id =$localStorage.department_id
   $scope.correctdata= function(checkdata){
        if(checkdata==undefined || checkdata==''){
          checkdata='';
        }
        return checkdata;
       }

  $scope.addissue=function(issude){
       if ($rootScope.imagedata!=undefined) {
        var imglength=$rootScope.imagedata.length
       }else{
        var imglength=""
       }
               if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }

   $rootScope.myApp.showPleaseWait();
      var issueaddReq={
                  "requestMessage": "issueAdd",
                  "requestId": "008",
                  "requestData": [
                    {

                      "student_id": student,
                      "dept_id": dept_id,
                      "issue_title": issude.title,
                      "issue_description": issude.desc,
                      "image_count": imglength,
                      "images": $scope.correctdata($rootScope.imagedata)               
                      
                    }
                  ]
                }
                // {
                //           "image": "image send by converting it into base64"
                //         },
                //         {
                //           "image": "image send by converting it into base64"
                //         },
                //         {
                //           "image": "image send by converting it into base64"
                //         }
console.log(JSON.stringify(issueaddReq))
console.log(urls.apiUrl+'issue-controller.php?action=issueAdd')
$http.post(urls.apiUrl+'issue-controller.php?action=issueAdd',issueaddReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
                 $rootScope.myApp.hidePleaseWait();
               $scope.successmsg=data.resultData[0].message;
               // toastr.success($scope.successmsg)
               Materialize.toast($scope.successmsg, 4000)
               $state.go('issues')
               $rootScope.imagedata=[];
             }else{
               $rootScope.myApp.hidePleaseWait();
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
        // toastr.error($scope.errormsg)
         Materialize.toast($scope.errormsg, 4000)
             }   
            })
            .error(function (data, status, header, config) {
               $rootScope.myApp.hidePleaseWait();
              console.log(JSON.stringify(data))
              });  
  }
})
.controller('feedbackCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$localStorage,$window) {
  // console.log($stateParams.news_id);
            if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }
  var student=$localStorage.student_id;
  var feedbackReq={
              "requestMessage": "feedbackList",
              "requestId": "009",
              "requestData": [
                {
                  "student_id":student 
              }
              ]
            }
console.log(JSON.stringify(feedbackReq))
console.log(urls.apiUrl+'feedback-controller.php?action=feedbackList')
$http.post(urls.apiUrl+'feedback-controller.php?action=feedbackList',feedbackReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
               $scope.feedbacklist=data.resultData[0].message;
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              });     
})
.controller('feedbackdetailCtrl', function($scope,$stateParams,urls,$state,toastr,$http,$localStorage) {
  // console.log($stateParams.news_id);
  var fbid=$stateParams.fbid;
  var student=$localStorage.student_id;
  // $scope.issuedeatil=function(issudeid){
      var fbdetReq={
                  "requestMessage": "feedbackDetail",
                  "requestId": "010",
                  "requestData": [
                    {
                      "feedback_id": fbid,
                    "student_id":student
                  }
                  ]
                }
console.log(JSON.stringify(fbdetReq))
console.log(urls.apiUrl+'feedback-controller.php?action=feedbackDetail')
$http.post(urls.apiUrl+'feedback-controller.php?action=feedbackDetail',fbdetReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
               $scope.fbdata=data.resultData[0];
             }else{
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
             }   
            })
            .error(function (data, status, header, config) {
              console.log(JSON.stringify(data))
              });        
})
.controller('feedbackaddCtrl', function($scope,$rootScope,$stateParams,urls,$state,$window,toastr,$http,$localStorage) {
  // console.log($stateParams.news_id);
 var dept_id= $localStorage.department_id
  var student=$localStorage.student_id;
  $scope.addfeedback=function(fbdata){
   $rootScope.myApp.showPleaseWait();
               if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {
   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }
      var fbdetReq={
                "requestMessage": "feedbackAdd",
                "requestId": "011",
                "requestData": [
                  {
                    "student_id": student,
                    "dept_id": dept_id,
                    "feedback_title": fbdata.title,
                    "feedback_description": fbdata.desc
                    
                  }
                ]
              }
console.log(JSON.stringify(fbdetReq))
console.log(urls.apiUrl+'feedback-controller.php?action=feedbackAdd')
$http.post(urls.apiUrl+'feedback-controller.php?action=feedbackAdd',fbdetReq)
    .success(function (data, status, headers, config) {
      console.log(data)
               if(data.response=="success"){
                     $rootScope.myApp.hidePleaseWait();
               $scope.successmsg=data.resultData[0].message;
               // toastr.success($scope.successmsg)
                Materialize.toast($scope.successmsg, 4000)
               $state.go('feedback')
             }else{
                   $rootScope.myApp.hidePleaseWait();
              console.log("error")
        $scope.errormsg=data.resultData[0].message;
         Materialize.toast($scope.errormsg, 4000)
             }   
            })
            .error(function (data, status, header, config) {
                   $rootScope.myApp.hidePleaseWait();
              console.log(JSON.stringify(data))
              });    
              }    
})