angular.module('mycollegeApp', ['ionic','ngCordova' ,'mycollegeApp.directives','mycollegeApp.controllers',
  'mycollegeApp.services','ngStorage','toastr'])

.config(function ($stateProvider, $urlRouterProvider,$locationProvider) {
        $stateProvider
            .state('login', {
                url: '/',
                templateUrl: 'view/login.html',
                controller:'LoginCtrl'
                
            })
             .state('otp', {
                url: '/otp/:mobileno',
                templateUrl: 'view/otp.html',
                controller:'verificationCtrl'
                
            })
             .state('home', {
                url: '/home',
                templateUrl: 'view/home.html',
                controller:'homeCtrl'
                
            })
              .state('news', {
                url: '/news/:dep_id',
                templateUrl: 'view/news.html',
                controller:'newsCtrl'
                
            })
                .state('newsdetail', {
                url: '/newsdetail/:news_id',
                templateUrl: 'view/newsdetail.html',
                controller:'newsdetailCtrl'
                
            })
               .state('issues', {
                url: '/issues',
                templateUrl: 'view/issues.html',
                controller:'issuesCtrl'
                
            })
                 .state('issuesform', {
                url: '/issuesform',
                templateUrl: 'view/issuesform.html',
                controller:'issuesaddCtrl'
            })
                 .state('issuesdet', {
                url: '/issuesdet/:iss_id',
                templateUrl: 'view/issuedetail.html',
                controller:'issuesdetailCtrl'
                
            }).state('feedback', {
                url: '/feedback',
                templateUrl: 'view/feedback.html',
                controller:'feedbackCtrl'
                
            })
            .state('feedbackdet', {
                url: '/feedbackdet/:fbid',
                templateUrl: 'view/feedbackdetail.html',
                controller:'feedbackdetailCtrl'
                
            })
                    .state('feedbackform', {
                url: '/feedbackform',
                templateUrl: 'view/feedbackform.html',
                controller:'feedbackaddCtrl'
                
            })

            
 // $urlRouterProvider.otherwise('/');
    })

.run(function($ionicPlatform,$localStorage,$state,$window,$cordovaDevice,$rootScope) {
  $ionicPlatform.ready(function() {

      var device = $cordovaDevice.getDevice();
        // $cordovaSplashscreen.show();
        var model = $cordovaDevice.getModel();
        var platform = $cordovaDevice.getPlatform();
        var uuid = $cordovaDevice.getUUID();
        var version = $cordovaDevice.getVersion();
console.log(uuid)
       // $localStorage.set('uuid', uuid);
       $localStorage.uuid=uuid;

      var push = PushNotification.init({
          android: {
              senderID: "141056873366",
              clearBadge:true
          },
          browser: {
              pushServiceURL: 'http://push.api.phonegap.com/v1/push'
          },
          ios: {
              alert: "true",
              badge: "true",
              sound: "true"
          },
          windows: {}
      });
    push.on('registration', function(data) {
          console.log("********------********* REGISTRATION");
          console.log(data);
     console.log('registration event: ' + data.registrationId);
     $localStorage.GcmRegId=data.registrationId
                    $rootScope.registerDisabled=true;
                    if (ionic.Platform.isIOS()) {
                        $rootScope.regId = data;
                        storeDeviceToken("ios");
                    }
                    if (ionic.Platform.isAndroid()) {
                        console.log("******* ANDROID ***** ")
                        // if($localstorage.get('sessionserverUserId')!=undefined){
                          registerAndroidGcmId(data);
                        // }
                        
                    }
        })
push.on('notification', function(notification) {

     console.log('notification event',notification);
 $localStorage.GcmRegId=notification.regid;
      if (ionic.Platform.isAndroid()) {
        handleAndroid(notification);
      } else if (ionic.Platform.isIOS()) {
        handleIOS(notification);
        $rootScope.$apply(function () {
                    console.log("in notifiiiiiiiiiiiiiiiiiii");
          $rootScope.notifications.push(JSON.stringify(notification.alert));
        })
      }
});
push.on('error', function(e) {
     console.log("push error = " + e.message);
});
      function registerAndroidGcmId(data){
          var regId = data.registrationId;
   
      }
              function handleAndroid(notification) {
      console.log('inside handleAndroid');
      console.log(notification);
      console.log("In foreground " + notification.foreground  + " Coldstart " + notification.coldstart);
      if (notification.event == "registered") {
                $rootScope.regId = notification.regid;
            } else if (notification.event == "message") {
            console.log("NOTIFICATION TRIGGERED");
            console.log(notification);
        if(notification.foreground) {
      console.log("notification");
        } else if(notification.coldstart) {
      console.log("notification");
        } else {
      console.log("notification");
        }
        
        $rootScope.$apply(function () {
                    console.log("in notiiiiiiiiiiiii");
          $rootScope.notifications.push(JSON.stringify(notification.message));
        })
      } else if (notification.event == "error")
   console.log("notification")
      else
      console.log("notification")
    }
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
    if($localStorage.student_id==undefined){
     $state.go('login')
    }else{
      $state.go('home')
    }

        if(window.Connection) {
                if(navigator.connection.type == Connection.NONE) {

   console.log("no internet")        
    Materialize.toast("Please check your internet connection", 4000)           
                }
                else{

                }
            }
  });
})