angular.module('creatise.material', [])

    .directive('materialModal', function ($compile,$timeout) {
        return {
            restrict: 'A',
            scope:{
                modalstatus:'=?'
            },
            link: function($scope, elem, attrs) {

                function openModal() {
                    console.log("open called")
                    var modalTarget=attrs.modaltarget;
                    // console.log(modalTarget)
                    if(modalTarget!=undefined){
                        var cover="<div class='creatise-modal-overlay'></div>";
                        var sm=$compile(cover)($scope);
                        $('body').append(sm);
                        $('.creatise-modal-overlay').css({'display':'block'});
                        $('.creatise-modal-overlay').css({'opacity':'0.5'});
                        $('.creatiseModal#'+modalTarget)
                            .css({'display':'block','opacity':1,'transform':'scaleX(1)'})
                    }
                }
                
                function closeModal() {
                    $('.creatiseModal').css({'transform':"scaleX(0.5)","opacity":0,'display':'none'});
                    $('.creatise-modal-overlay').css({'display':'none','opacity':'0'});
                    $('.creatise-modal-overlay').remove();
                    console.log("closed status")



                    $timeout(function () {
                        $scope.$apply(function () {
                            $scope.modalstatus = "hide";
                        });
                    });
                    console.log($scope.modalstatus);
                }
                
                $scope.$watch('modalstatus',function (newVal,old) {
                    // console.log("CREATED========"+$scope.modalstatus);
                    // console.log("NEW : "+newVal+"=== OLD : "+old);
                    if(newVal=='open')
                        openModal()
                    else if(newVal=='hide')
                        closeModal();
                })

                var modal=$('.creatiseModal');

                elem.bind('click', function() {
                    openModal();
                });

                $('body').on('click','.creatise-modal-overlay',function () {
                   closeModal();
                })
            }
        };
    })
    .directive('materialModalClose', function () {
        return {
            restrict: 'A',
            link: function(scope, elem, attrs) {
                elem.bind('click', function() {
                    $('.creatiseModal').css({'display':"none",'opacity':0});
                    $('.creatise-modal-overlay').css({'display':'none','opacity':'0'});
                    $('.creatise-modal-overlay').remove();
                })
            }
        };
    })

