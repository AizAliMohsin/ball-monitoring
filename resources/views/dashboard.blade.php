<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three.js Ball Position Dashboard</title>
    <style>
        body { margin: 0; }
        canvas { display: block; }
        #dashboard {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div id="dashboard">
        <h3>Ball Position</h3>
        <p id="position"></p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        let scene, camera, renderer, ball;

        function init() {
            // Create scene
            scene = new THREE.Scene();
            
            // Create camera
            camera = new THREE.PerspectiveCamera(
                75, 
                window.innerWidth / window.innerHeight, 
                0.1, 
                1000
            );
            camera.position.z = 5;

            // Create renderer
            renderer = new THREE.WebGLRenderer();
            renderer.setSize(window.innerWidth, window.innerHeight);
            document.body.appendChild(renderer.domElement);

            // Create a ball (SphereGeometry)
            const geometry = new THREE.SphereGeometry(0.5, 32, 32);
            const material = new THREE.MeshBasicMaterial({ color: 0x0077ff });
            ball = new THREE.Mesh(geometry, material);
            scene.add(ball);

            // Render the scene
            animate();
        }

        function animate() {
            requestAnimationFrame(animate);

            // Fetch ball position from the server
            fetch('/ball-position')
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        ball.position.set(data.x, data.y, data.z);
                        document.getElementById('position').innerText = `
                            X: ${data.x.toFixed(2)} 
                            Y: ${data.y.toFixed(2)} 
                            Z: ${data.z.toFixed(2)}
                        `;
                    }
                });

            renderer.render(scene, camera);
        }

        // Adjust camera and renderer on window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Initialize the scene
        init();
    </script>
</body>
</html>
