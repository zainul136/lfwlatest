
<style>
    #tree {
        background : #12203b17;

    }
    #tree svg {
        /* pointer-events : none; */
        height: auto;
        max-width: 100%;
    }
    #tree svg g.node rect{
        fill: #EAEBED;;
        border: 1px solid black;
        stroke: #99DDCC;
        height : 180px;
        stroke-width: 2px;
        rx : 3;
        ry : 3;
        /* y : 50 */
    }
    #tree svg g.node text{
        fill : black;
        text-transform : Capitalize;
        font-size : 14px;
    }

   
    #tree svg g.node image{
      
        x : 93;
        y : -32;
    }
    #tree svg g.node.deceased image{
        width : 65;
        height : 65px;
        x: 95;
        y: -30;
    }
    #tree svg g.node image.deceasedImg{
        width: 75px;
        height: 75px;
        y: -34;
        x: 90;
    }
    #tree svg #hugo_img_0 rect{
        y: -25;
        rx: 100;
        ry: 100;
        stroke: #99DDCC;
        stroke-width: 10px;
    }

    #tree svg g.node.deceased{
        filter: grayscale(1);
    }
    #tree svg #base_img_0 rect{
        rx : 50;
        ry : 50;
        x : 93;
        y : -32;
    }
    /* #tree svg g.node text.name{
         fill : white;
         x : 50
     }

     #tree svg g.node image.country{
         y: 207;
         width: 25;
         height: 25;
         x: 101;
     }
     #tree svg g.node .pfpBorderRadius{
         width : 120;
         height : 120;
         x : 38;
         rx : 100;
         fill : #99DDCC;
         ry : 100;
         stroke:  #99DDCC;
         stroke-width: 10px;

     }
     #tree svg g.node .nameRectContainer{
         x : 10;
         width : 170;
         height: 40;
         y: 135;
         rx: 22px;
         ry: 22px;
         fill : #99DDCC
     } */
     #tree svg g.node.deceased{
            filter : grayscale(1)
        }
        #tree svg g.node .VisitprofileButton{
            display : none;
            height : 30px;
        }
        #tree svg g.node.deceased{
            filter : grayscale(1)
            
        }
        #tree svg g.node.deceased:hover .VisitprofileButton{
            display : flex;
            fill : #99DDCC;
            cursor: pointer;
        }
        #tree svg g.node.deceased:hover text.VisitprofileButton{
            cursor: pointer;
            fill : white;
        }
        #tree svg g.node .namebackground{
            width : 180px;
            height : 28px;
            x : 35;
            rx : 15px;
            ry : 15px;
            fill : #99DDCC;
            y : 47;
        }
        #tree svg g.node .nameText{
            font-size: 14px; 
            fill : #ffffff !important;
        }
        

</style>

@php  use Carbon\Carbon;@endphp
<script src="{{ asset('storage/assets/familyTree/familytree.js') }}"></script>
<reference path="{{ asset('storage/assets/familyTree/familytree.d.ts')}}" />

@extends('main')
@section('title', $title)

@include('layouts.header')

<div style="width:100%;" id="tree">

</div>
<script>
    function calculateAge(birthdate) {
        const today = new Date();
        const birthDate = new Date(birthdate);

        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();

        // Adjust age if birthday hasn't occurred yet this year
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

</script>
<script>
    var  familyTreeData = <?php print_r(json_encode($nodes))?>;
    console.log('familyTreeData',familyTreeData)

    let formattedData = familyTreeData.map(person => {
        let data = {
            id: person.id,
        };
        if (person.pids && person.pids.length > 0) {

            let stringValue = person.pids;
            let parsedValue = JSON.parse(stringValue);

            let extractedValue = parsedValue[0];

            let integerValue = parseInt(extractedValue);
            data.pids = [integerValue];
        }
        if (person.fid) {
            data.fid = person.fid;
        }
        if (person.mid) {
            data.mid =person.mid;
        }

        let age = calculateAge(person.date_of_birth);
        data.age=age;

        data.profile_picture= "{{ asset('user_media') . '/' }}" + person.id + "/profile_picture/" + person.profile_picture;
        data.name=person.name;
        data.is_alive=person.is_alive ? 'Alive':"Deceased";
        data.country=person.country;

        return data;
    });


    console.log('formattedData',formattedData);
    FamilyTree.templates.tommy.field_0 =
        '<rect class="namebackground"></rect><text class="field_0 nameText"  x="125" y="66" text-anchor="middle">{val}</text>';
    FamilyTree.templates.tommy.field_1 =
        '<text class="field_1" style="font-size: 14px;" fill="#ffffff" x="125" y="94" text-anchor="middle">Country : {val}</text>';
    FamilyTree.templates.tommy.field_2 =
        '<text class="field_2" style="font-size: 14px;" fill="#ffffff" x="125" y="112" text-anchor="middle">{val}</text>';

    FamilyTree.templates.tommy.field_3 =
        '<text  class="AliveOrNot field_3" style="font-size: 14px;" fill="#ffffff" x="125" y="130" text-anchor="middle">{val}</text> <rect width="250" class="VisitprofileButton" height="20" onclick="VisitProfile()"  fill="black" x="0" y="160"> </rect> <text onclick="VisitProfile()" class="field_3 VisitprofileButton" style="font-size: 14px;" fill="#ffffff" x="125" y="180" text-anchor="middle">Visit Profile</text>  ';
    FamilyTree.templates.tommy.field_4 =
    '<text class="field_4" style="font-size: 14px;" fill="#ffffff" x="125" y="150" text-anchor="middle">Id : {val}</text>';

    // FamilyTree.templates.tommy.img_0 = 
    // '<image preserveAspectRatio="xMidYMid slice" xlink:href="{val}" x="20" y="-15" width="80" height="80"></image>';

    var family = new FamilyTree(document.getElementById("tree"), {
        mouseScrool: FamilyTree.action.none,
        nodeBinding: {
            field_0: "name",
            field_1: "country",
            field_2: "age",
            field_3: "is_alive",
            field_4: "id",
            img_0: "profile_picture",
        }
    });
    family.on('render-link', function (sender, args) {
        var cnodeData = family.get(args.cnode.id);
        var nodeData = family.get(args.node.id);
        if (cnodeData.divorced != undefined && nodeData.divorced != undefined &&
            cnodeData.divorced.includes(args.node.id) && nodeData.divorced.includes(args.cnode.id)) {
            console.log(args.html);
            args.html = args.html.replace("path", "path stroke-dasharray='3, 2'");
        }
    });


    const dataArray = Object.values(formattedData);
    console.log('dataArray',dataArray);

    family.load(dataArray);


</script>
<script>
    const SVGFunc = ()=>{
        const SvgG = document.querySelectorAll("#tree svg g.node")
        console.log(SvgG)
        SvgG.forEach((element) => {
            const rect = element.querySelector("rect")
            const TextEl = element.querySelectorAll("text")[0]

            const rect2Element = rect.cloneNode()
            rect2Element.classList.add("nameRectContainer")
            element.append(rect2Element)





            // relation
            const relation = TextEl.cloneNode()
            relation.innerHTML = `Me`
            relation.style.fontWeight = "bold"
            relation.setAttribute("y", "200")
            relation.setAttribute("x", "98")
            element.append(relation)


            // console.log(CountryEl)

            // CREATE AGE TEXT
            const Age = TextEl.cloneNode()
            Age.innerHTML = `Age : ${dataArray[0].age}`
            Age.setAttribute("y", "250")
            Age.setAttribute("x", "98")
            element.append(Age)


            // PFP BORDERRADIUS 
            const hugo_img_0 = document.querySelectorAll("#hugo_img_0 rect")
            // console.log(hugo_img_0)
            hugo_img_0.forEach(element => {
                element.setAttribute("x", "38")
                element.setAttribute("width", "120")
                element.setAttribute("height", "120")
                element.setAttribute("rx", "100")
                element.setAttribute("ry", "100")
            });
            // hugo_img_0.classList.add("pfpBorderRadius")


            const countryFlag = document.querySelector("#tree svg g.node image").cloneNode()
            countryFlag.setAttribute("xlink:href", "https://od.sn66.me/images/BG.png")
            countryFlag.removeAttribute("clip-path")
            countryFlag.classList.add("country")
            TextEl.setAttribute("y", "207")
            console.log(TextEl)
            element.append(countryFlag)
            // console.log(countryFlag)


            // NAME POSITION
            const NameEl = element.querySelector("text:nth-child(2)")
            NameEl.setAttribute("y", "162")
            NameEl.setAttribute("x", "98")
            NameEl.classList.add("name")
            element.append(NameEl)


            const CountryEl = element.querySelector("text:nth-child(2)")

            CountryEl.setAttribute("y", "220")
            CountryEl.setAttribute("x", "88")
        });



    }
    window.addEventListener("load", ()=>{
        // SVGFunc()
        const AliveOrNot = document.querySelectorAll("#tree svg g.node .AliveOrNot")
        AliveOrNot.forEach(element => {
            if(element.innerHTML == "Deceased"){
                console.log(element.innerHTML)
                element.parentElement.classList.add("deceased")
                // element.parentElement.classList.add("deceased")
            }
        });

        const names = document.querySelectorAll(".nameText")
        names.forEach(element => {
            console.log(element.innerHTML)
            if(element.innerHTML.length > 8){
                element.innerHTML = element.innerHTML.substr(0,7) + "..." 
            }
        });




        const SvgG = document.querySelectorAll("#tree svg g.node.deceased")
        SvgG.forEach(element => {
            const Image = element.querySelector("#tree svg g.node Image").cloneNode()
            Image.setAttribute("xlink:href", "https://od.sn66.me/images/deceased.png")
            Image.removeAttribute("clip-path")
            Image.classList.add("deceasedImg")
            element.append(Image)
        });
// Select the SVG elements (replace 'yourElementId' with the actual ID or another selection method)
var svgElements = document.querySelectorAll('.node'); // Select all elements with the 'node' class

// Define the amount of space you want to add (e.g., 50 units)
var spaceToAdd = 50;

// Loop through the selected elements and adjust the 'transform' attribute
svgElements.forEach(function (element, index) {
  // Get the current 'transform' attribute value
  var transform = element.getAttribute('transform');

  // Parse the 'transform' attribute to extract the '{x}' and '{y}' values
  var regex = /matrix\(1,0,0,1,(\d+),(\d+)\)/;
  var match = transform.match(regex);

  if (match) {
    // Extract the x and y values
    var x = parseInt(match[1]);
    var y = parseInt(match[2]);

    // Adjust the y value to create space between elements
    y += index * spaceToAdd; // Increase 'y' based on the index and spaceToAdd

    // Update the 'transform' attribute with the modified values
    var newTransform = `matrix(1,0,0,1,${x},${y})`;
    element.setAttribute('transform', newTransform);
  }
});




function increasePathLength(pathElement, increaseAmount) {
  // Get the current 'd' attribute value of the path
  var pathData = pathElement.getAttribute('d');

  // Use regular expressions to find the coordinates in the path data
  var matches = pathData.match(/(M|L)(\d+),(\d+)/g);

  // Check if there are matches
  if (matches) {
    // Get the last match, which is the ending point of the path
    var lastMatch = matches[matches.length - 1];

    // Extract the coordinates from the match
    var coordinates = lastMatch.match(/(\d+),(\d+)/);

    // Check if the coordinates are valid
    if (coordinates && coordinates.length === 3) {
      // Parse the X and Y values
      var x = parseInt(coordinates[1]);
      var y = parseInt(coordinates[2]);

      // Increase the Y-coordinate by the specified amount
      y += increaseAmount;

      // Replace the old Y-coordinate in the match with the updated Y-coordinate
      var newMatch = lastMatch.replace(/(\d+),(\d+)/, x + ',' + y);

      // Replace the last match in the path data with the updated match
      pathData = pathData.replace(lastMatch, newMatch);

      // Update the 'd' attribute of the path with the modified path data
      pathElement.setAttribute('d', pathData);
    }
  }
}

// Usage example:
var pathElement = document.querySelector('.link path'); // Replace with your actual path element
increasePathLength(pathElement, 50); // Increase the path length by 50 units

    })

</script>
