angular.module('app').controller("ImageCropperCtrl",[ '$scope', function($scope) 
{
        $scope.bounds = {};
        $scope.cropper = {};
        $scope.cropper.sourceImage = null;
        $scope.cropper.croppedImage   = null;
        $scope.bounds = {};
        $scope.bounds.left = 100;
        $scope.bounds.right = 200;
        $scope.bounds.top = 800;
        $scope.bounds.bottom = 100;
}]);