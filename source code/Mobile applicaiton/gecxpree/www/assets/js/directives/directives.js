angular.module('mycollegeApp.directives', [])

/*.directive('header', function () {
    return {
        restrict: 'AE',
        templateUrl: 'directives/headernav.html'
    };
})
  */
   .directive('headernav', function ($timeout) {
        return {
            restrict: 'AE',
            scope: {
                    departid:'=',
                     data_info:"="
            },
            link: function (scope, element, attrs) {
                      scope.info = attrs.info;
                 console.log(scope.info);
            },
            templateUrl: 'directives/headernav.html',
            controller:'mainCntrl'
        };

    })
       .directive('onError', function() {
      return {
        restrict:'A',
        link: function(scope, element, attr) {
          element.on('error', function() {
            element.attr('src', attr.onError);
          })
        }
      }
    })
                .directive('lazyLoad', function() {
        return function() {
            var bLazy = new Blazy();
        };
    })
    .directive('collapsible', function () {
    return {
      restrict: 'A',
      link: function (compile,scope) {
          //var temp = $compile("html")($scope);
          $(".group1").colorbox({
              rel:'group1',
              width:"75%",
              height:"75%",
              onComplete:function(compile,scope){
                  var html='<div class="report_spl popup_buttons" title="Tag / Untag this picture"></div>';
                  html+='<div class="download_spl popup_buttons" title="Download this"></div>';
                  html+='<div class="fb_spl popup_buttons" title="Share on Facebook"></div>';
                  html+='<div class="twitter_spl popup_buttons" title="Share on Twitter"></div>';
                  html+='<div class="email_spl popup_buttons" title="Email this"></div>';
                  //var temp = compile(html)(scope);

                  $('#cboxCurrent').html(html);
                  $('#cboxCurrent').css({'display':'block'})
                  $('[data-toggle="tooltip"]').tooltip()
                  //$('#cboxCurrent').html($compile(html)($scope));
              }
          });
      }
    };
})
         .directive('myUpload', [function () {
            return {
                restrict: 'AE',
                link: function (scope, elem, attrs) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        scope.image = e.target.result;
                        // console.log(scope.image)
                        scope.$emit("filedisplay", { filename: scope.image });
                        scope.$apply();
                    }

                    elem.on('change', function() {
                        reader.readAsDataURL(elem[0].files[0]);
                    });
                }
            };
        }])
          .directive('filemulUpload', function () {
    return {
        scope: true,        //create a new scope
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
              var files=[]
                 files.push(event.target.files) ;
                //iterate files since 'multiple' may be specified on the element
                for (var i = 0;i<files.length;i++) {
                    //emit event upward
                    scope.$emit("filemulSelected", { file: files[i] });
                } 
            });
        }
    };
})
           .directive('maximumWordsValidation', function () {
    'use strict';
    return {
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        console.log("yyyyyyyyyyyyyyyy")
        // Figure out name of count variable we will set on parent scope
        var wordCountName = attrs.ngModel.replace('.', '_') + '_words_count';

        scope.$watch(function () {
          return ngModelCtrl.$modelValue;
        }, function (newValue) {
            // console.log(newValue)
          var str = newValue && newValue.replace('\n', '');
          // Dont split when string is empty, else count becomes 1
          var wordCount = str ? str.split(' ').length : 0;
          // Set count variable
          scope.$parent[wordCountName] = wordCount;
          // Update validity
          var max = attrs.maximumWordsValidation;
          console.log(wordCount)
          console.log(max)


          ngModelCtrl.$setValidity('maximumWords', wordCount <= max);
             console.log("vvvvvv",ngModelCtrl)
        });
      }
    };
  })
  .directive('loadingMain', function ($timeout) {
        return {
            restrict: 'AEC',
            scope: {

            },
            link: function (scope, element, attrs) {

            },
            templateUrl: 'directives/loading.html'
        };
    })