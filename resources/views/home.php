<!doctype html>
<html ng-app="todoApp">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.30/angular.min.js"></script>

  </head>
  <body>
    <h2>Todo</h2>
    <div ng-controller="TodoListController">
      <b>
        {{quiz.name}} ({{quiz.id}} )
      </b>

      <ul>
        <li ng-if="alternatives!==null"  ng-repeat="a in alternatives">
          <a href="#" ng-click="goTo(a.goto_quiz_id, a.quiz_id)">{{a.name}}</a>
          <ul>
            <li ng-repeat="b in a.occupations">
              {{b.name}}
              <br>
              <b>Points:</b> {{b.pivot.points}}
            </li>
          </ul>
        </li>
      </ul>

      <br>

      <a href="#" ng-click="goTo(lastId)">Voltar</a><br>
      <a href="#" ng-click="reload()">Reload</a>
      <a href="#" ng-click="testJson()">Test</a>


    </div>
  </body>
</html>

  <script>
    var token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hcGlcL3YxXC91c2VyXC9hdXRoIiwiaWF0IjoxNDc4NjczMzQ5LCJleHAiOjE0Nzg2NzY5NDksIm5iZiI6MTQ3ODY3MzM0OSwianRpIjoiYzk3MTQ0NGYwMmFkOTJlODc2ZmJkYTg5ZTJmYWUzNWEifQ.E2kE6BxQ9fgXROvjvnGgJ5jbZv80sDxOBGzaAX-7LYg";

    var url="http://localhost:8000/api/v1";


    angular.module('todoApp', [])
      .controller('TodoListController', function($scope, $http) {

        $scope.goTo=function(quiz_id, nowid){
          console.log(quiz_id);
          for(r in $scope.quizData){
            if($scope.quizData[r].id==quiz_id){
              $scope.quiz={
                'name' : $scope.quizData[r].name,
                'id': $scope.quizData[r].id
              };
              $scope.alternatives=$scope.quizData[r].alternatives;
              $scope.lastId=nowid;
            }
          }
        };

        $scope.lastId=0;

        $scope.quizData=[];
        var todoList = this;
        $scope.teste="ola mundo";
        $scope.quiz="";
        $scope.alternatives=null;

        $scope.token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hcGlcL3YxXC91c2VyXC9hdXRoIiwiaWF0IjoxNDc4NjczMzQ5LCJleHAiOjE0Nzg2NzY5NDksIm5iZiI6MTQ3ODY3MzM0OSwianRpIjoiYzk3MTQ0NGYwMmFkOTJlODc2ZmJkYTg5ZTJmYWUzNWEifQ.E2kE6BxQ9fgXROvjvnGgJ5jbZv80sDxOBGzaAX-7LYg";


        $scope.reload=function(){
          $http.get(url+"/quiz/?token="+$scope.token)
          .then(function(response) {
            //console.log(response.data);
            for(r in response.data){
              //console.log(r);
              $scope.quizData=response.data;
              if(response.data[r].root==1){
                $scope.quiz={
                  'name': response.data[r].name,
                  'id' : response.data[r].id

                };
                //$scope.quiz.id=response.data[r].id;
                $scope.alternatives=response.data[r].alternatives;
              }
            }

            $scope.teste=response;
              //$scope.myWelcome = response.data;
          });
        };

        $scope.reload();


        $scope.testJson=function(){
          console.log('hello world');
          var json_data={
            quiz_data: [{ 	"quiz_id": 1, 	"quiz_alternative_id": 1 }, { 	"quiz_id": 1, 	"quiz_alternative_id": 1 }]
          };
          console.log(json_data);
          $http.post(
            url+"/quiz/user/mass?token="+$scope.token,
            json_data
          ).then(function(response) {

          });

        }



      });
  </script>
