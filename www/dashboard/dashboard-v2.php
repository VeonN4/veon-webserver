<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Veon's Webserver Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        mono: ['JetBrains Mono', 'Fira Code', 'Monaco', 'Consolas', 'monospace'],
                    },
                    colors: {
                        'dark': '#0a0a0a',
                        'darker': '#050505',
                        'gray-850': '#1a1a1a',
                        'gray-900': '#111111',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600;700&display=swap');
        
        .glow {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        
        .glow-hover:hover {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        
        .border-glow {
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .border-glow-bright {
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body class="min-h-screen bg-black text-white font-mono antialiased">
    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4 tracking-wider">
                Veon's Webserver Dashboard
            </h1>
            
            <!-- Description Box -->
            <div class="max-w-4xl mx-auto bg-gray-900 border-glow p-6 mb-8">
                <p class="text-gray-300 leading-relaxed text-sm">
                    If you're wondering why I created this, it's because I was tired of using XAMPP, and I 
                    received an error when I closed it improperly. I made it in Docker because I think it's more 
                    flexible, and I have more control over my web server because I built it.
                </p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Panel - Services -->
            <div class="bg-gray-900 border-glow p-6">
                <h2 class="text-xl font-semibold mb-6 pb-3 border-b border-gray-700">
                    Services
                </h2>
                
                <div class="space-y-4">
                    <!-- PhpMyAdmin -->
                    <div class="bg-gray-850 border-glow p-4 glow-hover transition-all duration-200 cursor-pointer"
                         onclick='gotoURL("http://localhost:8001")'>
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold text-lg">PhpMyAdmin</h3>
                                <p class="text-gray-400 text-sm">Database management interface</p>
                            </div>
                            <div class="text-2xl">▣</div>
                        </div>
                    </div>

                    <!-- Pages -->
                    <div class="bg-gray-850 border-glow">
                        <div class="p-4 cursor-pointer glow-hover transition-all duration-200" 
                             onclick="togglePages()">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-lg">Pages</h3>
                                    <p class="text-gray-400 text-sm">Available project directories</p>
                                </div>
                                <div class="text-2xl">
                                    <span id="pagesArrow" class="transition-transform duration-200">▼</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pages List -->
                        <div id="pagesList" class="hidden border-t border-gray-700">
                            <a href="../project1" class="block p-3 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors border-b border-gray-800 last:border-b-0">
                                <span class="text-gray-500">├─</span> /project1
                            </a>
                            <a href="../project2" class="block p-3 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors border-b border-gray-800 last:border-b-0">
                                <span class="text-gray-500">├─</span> /project2
                            </a>
                            <a href="../api" class="block p-3 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-colors border-b border-gray-800 last:border-b-0">
                                <span class="text-gray-500">└─</span> /api
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - System Status -->
            <div class="bg-gray-900 border-glow p-6">
                <h2 class="text-xl font-semibold mb-6 pb-3 border-b border-gray-700">
                    System Status
                </h2>
                
                <div class="space-y-6">
                    <!-- Server Info -->
                    <div class="bg-gray-850 border-glow p-4">
                        <h3 class="font-semibold mb-3">Server Information</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Status:</span>
                                <span class="text-green-400">● ONLINE</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Version:</span>
                                <span id="main-version">v1.2.3</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Build:</span>
                                <span id="build-hash" class="font-mono text-xs">a7f3c21</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Environment:</span>
                                <span id="environment" class="text-blue-400">production</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Uptime:</span>
                                <span id="uptime">2h 34m</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Container:</span>
                                <span>Docker</span>
                            </div>
                        </div>
                        
                        <!-- Expandable Version Details -->
                        <div class="mt-3 pt-3 border-t border-gray-700">
                            <button onclick="toggleVersionDetails()" 
                                    class="text-xs text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                                <span id="details-arrow" class="transition-transform">▶</span>
                                <span>Version Details</span>
                            </button>
                            
                            <div id="version-details" class="hidden mt-3 space-y-2 text-xs">
                                <div class="bg-gray-900 border border-gray-700 p-3 rounded">
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <span class="text-gray-500">Branch:</span>
                                            <span id="git-branch" class="text-gray-300 ml-2">main</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Commit:</span>
                                            <span id="git-commit" class="text-gray-300 ml-2 font-mono">a7f3c21f</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Built:</span>
                                            <span id="build-time" class="text-gray-300 ml-2">2024-07-31 14:22</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Deployed:</span>
                                            <span id="deploy-time" class="text-gray-300 ml-2">2024-07-31 16:45</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">PHP:</span>
                                            <span id="php-version" class="text-gray-300 ml-2">8.1.12</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-500">Server:</span>
                                            <span id="server-info" class="text-gray-300 ml-2">Apache/2.4</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Version History Preview -->
                                <div class="bg-gray-900 border border-gray-700 p-3 rounded">
                                    <div class="text-gray-400 mb-2">Recent Versions:</div>
                                    <div class="space-y-1 text-xs">
                                        <div class="flex justify-between">
                                            <span class="text-green-400">v1.2.3</span>
                                            <span class="text-gray-500">current</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">v1.2.2</span>
                                            <span class="text-gray-500">2 days ago</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">v1.2.1</span>
                                            <span class="text-gray-500">1 week ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resource Usage -->
                    <div class="bg-gray-850 border-glow p-4">
                        <h3 class="font-semibold mb-3">Resource Usage</h3>
                        <div class="space-y-3">
                            <!-- CPU -->
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-400">CPU</span>
                                    <span>12%</span>
                                </div>
                                <div class="w-full bg-gray-800 h-2 border border-gray-700">
                                    <div class="bg-white h-full" style="width: 12%"></div>
                                </div>
                            </div>
                            
                            <!-- Memory -->
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-400">Memory</span>
                                    <span>35%</span>
                                </div>
                                <div class="w-full bg-gray-800 h-2 border border-gray-700">
                                    <div class="bg-white h-full" style="width: 35%"></div>
                                </div>
                            </div>
                            
                            <!-- Network -->
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-400">Network</span>
                                    <span>8%</span>
                                </div>
                                <div class="w-full bg-gray-800 h-2 border border-gray-700">
                                    <div class="bg-white h-full" style="width: 8%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-gray-850 border-glow p-4">
                        <h3 class="font-semibold mb-3">Recent Activity</h3>
                        <div class="space-y-2 text-xs">
                            <div class="flex justify-between text-gray-400">
                                <span>12:34:56</span>
                                <span>Container started</span>
                            </div>
                            <div class="flex justify-between text-gray-400">
                                <span>12:35:12</span>
                                <span>MySQL connected</span>
                            </div>
                            <div class="flex justify-between text-gray-400">
                                <span>12:35:24</span>
                                <span>Web server online</span>
                            </div>
                            <div class="flex justify-between text-gray-400">
                                <span>14:22:11</span>
                                <span>Dashboard accessed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="max-w-7xl mx-auto mt-12 pt-6 border-t border-gray-800 text-center">
            <div class="text-gray-500 text-sm">
                <span>Veon's Custom Docker Webserver</span>
                <span class="mx-4">•</span>
                <span>Built with precision and control</span>
                <span class="mx-4">•</span>
                <span>v0.0.1</span>
            </div>
        </div>
    </div>

    <script>
        function togglePages() {
            const pagesList = document.getElementById('pagesList');
            const arrow = document.getElementById('pagesArrow');
            
            if (pagesList.classList.contains('hidden')) {
                pagesList.classList.remove('hidden');
                arrow.style.transform = 'rotate(180deg)';
            } else {
                pagesList.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }

        function toggleVersionDetails() {
            const details = document.getElementById('version-details');
            const arrow = document.getElementById('details-arrow');
            
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                arrow.style.transform = 'rotate(90deg)';
            } else {
                details.classList.add('hidden');
                arrow.style.transform = 'rotate(0deg)';
            }
        }

        // Hybrid Version System Implementation
        async function loadVersionInfo() {
            try {
                // Simulate API call - replace with actual endpoint
                const versionInfo = await simulateVersionAPI();
                updateVersionDisplay(versionInfo);
            } catch (error) {
                console.error('Failed to load version info:', error);
                // Fallback to default values
                updateVersionDisplay({
                    version: 'v0.0.1',
                    build: { short_hash: 'unknown' },
                    environment: { environment: 'development' }
                });
            }
        }

        // Simulate the version API response (replace with real fetch)
        async function simulateVersionAPI() {
            return new Promise(resolve => {
                setTimeout(() => {
                    resolve({
                        version: 'v1.2.3',
                        build: {
                            commit: 'a7f3c21f8b9d4e5f6a7b8c9d0e1f2a3b4c5d6e7f',
                            short_hash: 'a7f3c21',
                            branch: 'main'
                        },
                        deployment: {
                            build_time: '2024-07-31 14:22:15 UTC',
                            deploy_time: '2024-07-31 16:45:32 UTC',
                            uptime: '2h 34m'
                        },
                        environment: {
                            environment: 'production',
                            docker: true,
                            php_version: '8.1.12',
                            server: 'Apache/2.4.57'
                        }
                    });
                }, 500);
            });
        }

        function updateVersionDisplay(info) {
            // Update main display
            document.getElementById('main-version').textContent = info.version;
            document.getElementById('build-hash').textContent = info.build.short_hash;
            document.getElementById('environment').textContent = info.environment.environment;
            document.getElementById('uptime').textContent = info.deployment?.uptime || '2h 34m';

            // Update detailed view
            document.getElementById('git-branch').textContent = info.build.branch || 'unknown';
            document.getElementById('git-commit').textContent = info.build.commit?.substring(0, 8) || 'unknown';
            document.getElementById('build-time').textContent = info.deployment?.build_time || 'unknown';
            document.getElementById('deploy-time').textContent = info.deployment?.deploy_time || 'unknown';
            document.getElementById('php-version').textContent = info.environment?.php_version || 'unknown';
            document.getElementById('server-info').textContent = info.environment?.server || 'unknown';

            // Update environment color
            const envElement = document.getElementById('environment');
            envElement.className = info.environment.environment === 'production' 
                ? 'text-green-400' 
                : info.environment.environment === 'staging' 
                ? 'text-yellow-400' 
                : 'text-blue-400';
        }

        // Load version info on page load
        document.addEventListener('DOMContentLoaded', loadVersionInfo);

        // Original functions
        const gotoPage = (page) => {
            const currentURL = window.location.href;
            const newURL = currentURL.replace("dashboard", page);
            window.location.href = newURL;
            return newURL;
        };

        const gotoURL = (url) => {
            window.location.href = url;
        };

        // Add some dynamic effects
        setInterval(() => {
            // Simulate changing resource usage
            const bars = document.querySelectorAll('.bg-white');
            bars.forEach(bar => {
                const currentWidth = parseInt(bar.style.width);
                const change = Math.random() * 6 - 3; // Random change between -3 and +3
                const newWidth = Math.max(0, Math.min(100, currentWidth + change));
                bar.style.width = newWidth + '%';
                
                // Update the percentage text
                const container = bar.closest('div').previousElementSibling;
                const percentSpan = container.querySelector('span:last-child');
                percentSpan.textContent = Math.round(newWidth) + '%';
            });
        }, 2000);

        // Add current time to activity log periodically
        setInterval(() => {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('en-US', { hour12: false });
            
            const activities = [
                'Health check passed',
                'Request processed',
                'Cache updated',
                'Log rotated',
                'Memory optimized'
            ];
            
            const randomActivity = activities[Math.floor(Math.random() * activities.length)];
            
            // Add new entry (simplified for demo)
            console.log(`${timeStr} - ${randomActivity}`);
        }, 10000);
    </script>
</body>
</html>