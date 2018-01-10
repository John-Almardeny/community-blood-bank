  var app = angular.module('bloodTypes', []);
  app.controller('TypesController', function($scope){
	  $scope.types = [
			{
				"name": "A+",
				"description": "The red blood cell has only A molecules on it. And the antigen called the Rh factor is present (+) on the cell.",
				"image": "images/A+.png",
				"donationCompatibility": "Donate Blood To: A+ AB+. Receive Blood From: A+ A- O+ O-",
				"bloodTypeDiet": "Flourishes on vegetarian diets, the inheritance of their more settled and less warlike farmer ancestors. The type A diet contains soy proteins, grains, and organic vegetables and encourages gentle exercise.",
				"personality": "Type A is calm and trustworthy."
			},   
			{
				"name": "B+",
				"description": "The red blood cell has only B molecules on it. And the antigen called the Rh factor is present (+) on the cell.",
				"image": "images/B+.png",
				"donationCompatibility": "Donate Blood To: B+ AB+. Receive Blood From: B+ B- O+ O-",
				"bloodTypeDiet": "Flourishes on vegetarian diets, the inheritance of their more settled and less warlike farmer ancestors. The type A diet contains soy proteins, grains, and organic vegetables and encourages gentle exercise.",
				"personality": "Type B is creative and excitable."
			},
			{
				"name": "AB+",
				"description": "The red blood cell has a mixture of both A & B molecules. And the antigen called the Rh factor is present (+) on the cell.",
				"image": "images/AB+.png",
				"donationCompatibility": "Donate Blood To: AB+. Receive Blood From: Everyone",
				"bloodTypeDiet": "Has a sensitive digestive tract and should avoid chicken, beef, and pork but enjoy seafood, tofu, dairy, and most produce. The fitness regimen for ABs is calming exercises.",
				"personality": "Type AB is thoughtful and emotional."
			},  
			{
				"name": "O+",
				"description": "The red blood cell has neither A or B molecule. And the antigen called the Rh factor is present (+) on the cell.",
				"image": "images/O+.png",
				"donationCompatibility": "Donate Blood To: O+ A+ B+ AB+. Receive Blood From: O+ O-",
				"bloodTypeDiet": "Your digestive tract retains the memory of ancient times, so your metabolism will benefit from lean meats, poultry, and fish. You're advised to restrict grains, breads, and legumes, and to enjoy vigorous exercise.",
				"personality": "Type O is a confident leader."
			},  
			{
				"name": "A-",
				"description": "The red blood cell has only A molecules on it. And the antigen called the Rh factor is absent (-) on the cell.",
				"image": "images/A-.png",
				"donationCompatibility": "Donate Blood To: A+ A- AB+ AB-. Receive Blood From: A- O-",
				"bloodTypeDiet": "Flourishes on vegetarian diets, the inheritance of their more settled and less warlike farmer ancestors, The type A diet contains soy proteins, grains, and organic vegetables and encourages gentle exercise.",
				"personality": "Type A is calm and trustworthy."
			},  
			{
				"name": "B-",
				"description": "The red blood cell has only B molecules on it. And the antigen called the Rh factor is absent (-) on the cell.",
				"image": "images/B-.png",
				"donationCompatibility": "Donate Blood To: B+ B- AB+ AB-. Receive Blood From: B- O-",
				"bloodTypeDiet": "The nomadic blood type B has a tolerant digestive system and can enjoy low-fat dairy, meat, and produce but, among other things, should avoid wheat, corn, and lentils. If you're type B, it's recommended you exercise moderately.",
				"personality": "Type B is creative and excitable."
			},  
			{
				"name": "AB-",
				"description": "The red blood cell has a mixture of both A & B molecules. And the antigen called the Rh factor is absent (-) on the cell.",
				"image": "images/AB-.png",
				"donationCompatibility": "Donate Blood To: AB+ AB-. Receive Blood From: AB- A- B- O-",
				"bloodTypeDiet": "Has a sensitive digestive tract and should avoid chicken, beef, and pork but enjoy seafood, tofu, dairy, and most produce. The fitness regimen for ABs is calming exercises.",
				"personality": "Type AB is thoughtful and emotional."
			},  
			{
				"name": "O-",
				"description": "The red blood cell has neither A or B molecule. And the antigen called the Rh factor is absent (-) on the cell.",
				"image": "images/O-.png",
				"donationCompatibility": "Donate Blood To: Everyone. Receive Blood From: O-",
				"bloodTypeDiet": "Your digestive tract retains the memory of ancient times, so your metabolism will benefit from lean meats, poultry, and fish. You're advised to restrict grains, breads, and legumes, and to enjoy vigorous exercise.",
				"personality": "Type O is a confident leader."
			}
		];
	});

  app.controller('TabController', function($scope){
    $scope.tab = 4;

    $scope.setTab = function(newValue){
      $scope.tab = newValue;
    };

   $scope.isSet = function(tabNumber){
      return $scope.tab === tabNumber;
    };
  });











