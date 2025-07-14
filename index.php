<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Algoritma Searching dan Sorting</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .section {
            margin-bottom: 40px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 5px solid #3498db;
        }
        .algorithm-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .algorithm-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 2px solid #e9ecef;
            transition: transform 0.3s ease;
        }
        .algorithm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .algorithm-title {
            color: #2c3e50;
            font-size: 1.3em;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .controls {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        input[type="text"], select {
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            margin: 5px;
            font-size: 16px;
        }
        button {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            transition: background 0.3s ease;
        }
        button:hover {
            background: linear-gradient(45deg, #2980b9, #1f618d);
        }
        .result {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            font-family: monospace;
            white-space: pre-wrap;
        }
        .iteration {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0;
            font-family: monospace;
            font-size: 14px;
        }
        .performance {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            font-weight: bold;
        }
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .comparison-table th, .comparison-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .comparison-table th {
            background: #3498db;
            color: white;
        }
        .comparison-table tr:nth-child(even) {
            background: #f2f2f2;
        }
        .best-performance {
            background: #d4edda !important;
            font-weight: bold;
        }
        .array-visualization {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin: 10px 0;
        }
        .array-item {
            background: #3498db;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
        }
        .array-item.comparing {
            background: #e74c3c;
            animation: pulse 0.5s ease-in-out;
        }
        .array-item.found {
            background: #27ae60;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Analisis Algoritma Searching dan Sorting</h1>
        
        <div class="section">
            <h2>🎯 Kontrol Pengujian</h2>
            <div class="controls">
                <input type="text" id="arrayInput" placeholder="Masukkan array (pisahkan dengan koma): 5,2,8,1,9,3" value="5,2,8,1,9,3,7,4,6">
                <input type="text" id="searchValue" placeholder="Nilai yang dicari: 7" value="7">
                <select id="algorithmType">
                    <option value="all">Semua Algoritma</option>
                    <option value="searching">Searching Saja</option>
                    <option value="sorting">Sorting Saja</option>
                </select>
                <button onclick="runAnalysis()">🚀 Jalankan Analisis</button>
                <button onclick="clearResults()">🧹 Bersihkan Hasil</button>
            </div>
        </div>

        <div id="results"></div>
        
        <div class="section">
            <h2>📊 Kesimpulan Teoritis</h2>
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Algoritma</th>
                        <th>Tipe</th>
                        <th>Time Complexity (Best)</th>
                        <th>Time Complexity (Average)</th>
                        <th>Time Complexity (Worst)</th>
                        <th>Space Complexity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Linear Search</td>
                        <td>Searching</td>
                        <td>O(1)</td>
                        <td>O(n)</td>
                        <td>O(n)</td>
                        <td>O(1)</td>
                    </tr>
                    <tr>
                        <td>Binary Search</td>
                        <td>Searching</td>
                        <td>O(1)</td>
                        <td>O(log n)</td>
                        <td>O(log n)</td>
                        <td>O(1)</td>
                    </tr>
                    <tr>
                        <td>Bubble Sort</td>
                        <td>Sorting</td>
                        <td>O(n)</td>
                        <td>O(n²)</td>
                        <td>O(n²)</td>
                        <td>O(1)</td>
                    </tr>
                    <tr>
                        <td>Selection Sort</td>
                        <td>Sorting</td>
                        <td>O(n²)</td>
                        <td>O(n²)</td>
                        <td>O(n²)</td>
                        <td>O(1)</td>
                    </tr>
                    <tr>
                        <td>Insertion Sort</td>
                        <td>Sorting</td>
                        <td>O(n)</td>
                        <td>O(n²)</td>
                        <td>O(n²)</td>
                        <td>O(1)</td>
                    </tr>
                    <tr class="best-performance">
                        <td>Quick Sort</td>
                        <td>Sorting</td>
                        <td>O(n log n)</td>
                        <td>O(n log n)</td>
                        <td>O(n²)</td>
                        <td>O(log n)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        class AlgorithmAnalyzer {
            constructor() {
                this.iterations = [];
                this.comparisons = 0;
                this.swaps = 0;
            }

            reset() {
                this.iterations = [];
                this.comparisons = 0;
                this.swaps = 0;
            }

            addIteration(description, array = null, highlight = []) {
                this.iterations.push({
                    description,
                    array: array ? [...array] : null,
                    highlight,
                    comparisons: this.comparisons,
                    swaps: this.swaps
                });
            }

            // Searching Algorithms
            linearSearch(arr, target) {
                this.reset();
                this.addIteration(`Memulai Linear Search untuk mencari ${target}`, arr);
                
                for (let i = 0; i < arr.length; i++) {
                    this.comparisons++;
                    this.addIteration(`Iterasi ${i + 1}: Membandingkan arr[${i}] = ${arr[i]} dengan ${target}`, arr, [i]);
                    
                    if (arr[i] === target) {
                        this.addIteration(`✅ FOUND! Nilai ${target} ditemukan pada index ${i}`, arr, [i]);
                        return { found: true, index: i, iterations: this.iterations, comparisons: this.comparisons };
                    }
                }
                
                this.addIteration(`❌ NOT FOUND! Nilai ${target} tidak ditemukan dalam array`, arr);
                return { found: false, index: -1, iterations: this.iterations, comparisons: this.comparisons };
            }

            binarySearch(arr, target) {
                this.reset();
                let sortedArr = [...arr].sort((a, b) => a - b);
                this.addIteration(`Memulai Binary Search untuk mencari ${target}`, sortedArr);
                this.addIteration(`Array sudah diurutkan: [${sortedArr.join(', ')}]`, sortedArr);
                
                let left = 0, right = sortedArr.length - 1;
                
                while (left <= right) {
                    this.comparisons++;
                    let mid = Math.floor((left + right) / 2);
                    
                    this.addIteration(`Iterasi: left=${left}, right=${right}, mid=${mid}`, sortedArr, [left, mid, right]);
                    this.addIteration(`Membandingkan arr[${mid}] = ${sortedArr[mid]} dengan ${target}`, sortedArr, [mid]);
                    
                    if (sortedArr[mid] === target) {
                        this.addIteration(`✅ FOUND! Nilai ${target} ditemukan pada index ${mid}`, sortedArr, [mid]);
                        return { found: true, index: mid, iterations: this.iterations, comparisons: this.comparisons };
                    } else if (sortedArr[mid] < target) {
                        left = mid + 1;
                        this.addIteration(`arr[${mid}] < ${target}, pencarian di bagian kanan`, sortedArr);
                    } else {
                        right = mid - 1;
                        this.addIteration(`arr[${mid}] > ${target}, pencarian di bagian kiri`, sortedArr);
                    }
                }
                
                this.addIteration(`❌ NOT FOUND! Nilai ${target} tidak ditemukan dalam array`, sortedArr);
                return { found: false, index: -1, iterations: this.iterations, comparisons: this.comparisons };
            }

            // Sorting Algorithms
            bubbleSort(arr) {
                this.reset();
                let result = [...arr];
                let n = result.length;
                
                this.addIteration(`Memulai Bubble Sort dengan array: [${result.join(', ')}]`, result);
                
                for (let i = 0; i < n - 1; i++) {
                    let swapped = false;
                    this.addIteration(`--- Pass ${i + 1} ---`, result);
                    
                    for (let j = 0; j < n - i - 1; j++) {
                        this.comparisons++;
                        this.addIteration(`Membandingkan arr[${j}] = ${result[j]} dengan arr[${j + 1}] = ${result[j + 1]}`, result, [j, j + 1]);
                        
                        if (result[j] > result[j + 1]) {
                            [result[j], result[j + 1]] = [result[j + 1], result[j]];
                            this.swaps++;
                            swapped = true;
                            this.addIteration(`Swap! ${result[j + 1]} <-> ${result[j]}`, result, [j, j + 1]);
                        }
                    }
                    
                    if (!swapped) {
                        this.addIteration(`Tidak ada swap pada pass ini, array sudah terurut`, result);
                        break;
                    }
                }
                
                this.addIteration(`✅ Bubble Sort selesai! Array terurut: [${result.join(', ')}]`, result);
                return { sorted: result, iterations: this.iterations, comparisons: this.comparisons, swaps: this.swaps };
            }

            selectionSort(arr) {
                this.reset();
                let result = [...arr];
                let n = result.length;
                
                this.addIteration(`Memulai Selection Sort dengan array: [${result.join(', ')}]`, result);
                
                for (let i = 0; i < n - 1; i++) {
                    let minIdx = i;
                    this.addIteration(`--- Pass ${i + 1}: Mencari minimum dari index ${i} ---`, result, [i]);
                    
                    for (let j = i + 1; j < n; j++) {
                        this.comparisons++;
                        this.addIteration(`Membandingkan arr[${j}] = ${result[j]} dengan minimum saat ini arr[${minIdx}] = ${result[minIdx]}`, result, [j, minIdx]);
                        
                        if (result[j] < result[minIdx]) {
                            minIdx = j;
                            this.addIteration(`Minimum baru ditemukan pada index ${minIdx}`, result, [minIdx]);
                        }
                    }
                    
                    if (minIdx !== i) {
                        [result[i], result[minIdx]] = [result[minIdx], result[i]];
                        this.swaps++;
                        this.addIteration(`Swap! arr[${i}] <-> arr[${minIdx}]`, result, [i, minIdx]);
                    }
                }
                
                this.addIteration(`✅ Selection Sort selesai! Array terurut: [${result.join(', ')}]`, result);
                return { sorted: result, iterations: this.iterations, comparisons: this.comparisons, swaps: this.swaps };
            }

            insertionSort(arr) {
                this.reset();
                let result = [...arr];
                let n = result.length;
                
                this.addIteration(`Memulai Insertion Sort dengan array: [${result.join(', ')}]`, result);
                
                for (let i = 1; i < n; i++) {
                    let key = result[i];
                    let j = i - 1;
                    
                    this.addIteration(`--- Pass ${i}: Menyisipkan ${key} ke posisi yang tepat ---`, result, [i]);
                    
                    while (j >= 0 && result[j] > key) {
                        this.comparisons++;
                        this.addIteration(`Membandingkan arr[${j}] = ${result[j]} dengan key = ${key}`, result, [j]);
                        
                        result[j + 1] = result[j];
                        this.addIteration(`Geser arr[${j}] ke posisi ${j + 1}`, result, [j, j + 1]);
                        j--;
                    }
                    
                    if (j >= 0) this.comparisons++;
                    result[j + 1] = key;
                    this.addIteration(`Sisipkan ${key} pada posisi ${j + 1}`, result, [j + 1]);
                }
                
                this.addIteration(`✅ Insertion Sort selesai! Array terurut: [${result.join(', ')}]`, result);
                return { sorted: result, iterations: this.iterations, comparisons: this.comparisons, swaps: this.swaps };
            }

            quickSort(arr) {
                this.reset();
                let result = [...arr];
                
                this.addIteration(`Memulai Quick Sort dengan array: [${result.join(', ')}]`, result);
                
                const quickSortHelper = (arr, low, high) => {
                    if (low < high) {
                        let pi = this.partition(arr, low, high);
                        quickSortHelper(arr, low, pi - 1);
                        quickSortHelper(arr, pi + 1, high);
                    }
                };
                
                quickSortHelper(result, 0, result.length - 1);
                this.addIteration(`✅ Quick Sort selesai! Array terurut: [${result.join(', ')}]`, result);
                
                return { sorted: result, iterations: this.iterations, comparisons: this.comparisons, swaps: this.swaps };
            }

            partition(arr, low, high) {
                let pivot = arr[high];
                this.addIteration(`Partition: pivot = ${pivot}, range [${low}, ${high}]`, arr, [high]);
                
                let i = low - 1;
                
                for (let j = low; j < high; j++) {
                    this.comparisons++;
                    this.addIteration(`Membandingkan arr[${j}] = ${arr[j]} dengan pivot = ${pivot}`, arr, [j, high]);
                    
                    if (arr[j] <= pivot) {
                        i++;
                        [arr[i], arr[j]] = [arr[j], arr[i]];
                        this.swaps++;
                        this.addIteration(`Swap! arr[${i}] <-> arr[${j}]`, arr, [i, j]);
                    }
                }
                
                [arr[i + 1], arr[high]] = [arr[high], arr[i + 1]];
                this.swaps++;
                this.addIteration(`Tempatkan pivot pada posisi ${i + 1}`, arr, [i + 1]);
                
                return i + 1;
            }
        }

        const analyzer = new AlgorithmAnalyzer();

        function runAnalysis() {
            const arrayInput = document.getElementById('arrayInput').value;
            const searchValue = parseInt(document.getElementById('searchValue').value);
            const algorithmType = document.getElementById('algorithmType').value;
            
            const arr = arrayInput.split(',').map(num => parseInt(num.trim()));
            const resultsDiv = document.getElementById('results');
            
            let html = '<div class="section"><h2>📈 Hasil Analisis</h2>';
            
            const algorithms = [];
            
            if (algorithmType === 'all' || algorithmType === 'searching') {
                // Linear Search
                const linearResult = analyzer.linearSearch(arr, searchValue);
                algorithms.push({
                    name: 'Linear Search',
                    type: 'Searching',
                    result: linearResult,
                    performance: linearResult.comparisons
                });
                
                // Binary Search
                const binaryResult = analyzer.binarySearch(arr, searchValue);
                algorithms.push({
                    name: 'Binary Search',
                    type: 'Searching',
                    result: binaryResult,
                    performance: binaryResult.comparisons
                });
            }
            
            if (algorithmType === 'all' || algorithmType === 'sorting') {
                // Bubble Sort
                const bubbleResult = analyzer.bubbleSort(arr);
                algorithms.push({
                    name: 'Bubble Sort',
                    type: 'Sorting',
                    result: bubbleResult,
                    performance: bubbleResult.comparisons
                });
                
                // Selection Sort
                const selectionResult = analyzer.selectionSort(arr);
                algorithms.push({
                    name: 'Selection Sort',
                    type: 'Sorting',
                    result: selectionResult,
                    performance: selectionResult.comparisons
                });
                
                // Insertion Sort
                const insertionResult = analyzer.insertionSort(arr);
                algorithms.push({
                    name: 'Insertion Sort',
                    type: 'Sorting',
                    result: insertionResult,
                    performance: insertionResult.comparisons
                });
                
                // Quick Sort
                const quickResult = analyzer.quickSort(arr);
                algorithms.push({
                    name: 'Quick Sort',
                    type: 'Sorting',
                    result: quickResult,
                    performance: quickResult.comparisons
                });
            }
            
            // Find best performance
            const bestPerformance = Math.min(...algorithms.map(a => a.performance));
            
            // Display results
            html += '<div class="algorithm-container">';
            
            algorithms.forEach(algo => {
                const isBest = algo.performance === bestPerformance;
                html += `<div class="algorithm-card ${isBest ? 'best-performance' : ''}">
                    <div class="algorithm-title">${algo.name} ${isBest ? '🏆' : ''}</div>
                    <div class="performance">
                        Perbandingan: ${algo.result.comparisons}<br>
                        ${algo.result.swaps !== undefined ? `Pertukaran: ${algo.result.swaps}<br>` : ''}
                        ${isBest ? 'TERCEPAT! 🚀' : ''}
                    </div>
                    <div class="result">
                        ${algo.type === 'Searching' ? 
                            `Hasil: ${algo.result.found ? `Ditemukan pada index ${algo.result.index}` : 'Tidak ditemukan'}` :
                            `Hasil: [${algo.result.sorted.join(', ')}]`
                        }
                    </div>
                    <div style="max-height: 300px; overflow-y: auto;">
                        ${algo.result.iterations.map(iter => `
                            <div class="iteration">
                                ${iter.description}
                                ${iter.array ? `<div class="array-visualization">
                                    ${iter.array.map((val, idx) => `
                                        <div class="array-item ${iter.highlight.includes(idx) ? 'comparing' : ''}">${val}</div>
                                    `).join('')}
                                </div>` : ''}
                            </div>
                        `).join('')}
                    </div>
                </div>`;
            });
            
            html += '</div>';
            
            // Performance comparison
            html += '<h3>🏁 Perbandingan Performa</h3>';
            html += '<table class="comparison-table"><thead><tr><th>Algoritma</th><th>Tipe</th><th>Jumlah Perbandingan</th><th>Jumlah Pertukaran</th><th>Status</th></tr></thead><tbody>';
            
            algorithms.forEach(algo => {
                const isBest = algo.performance === bestPerformance;
                html += `<tr ${isBest ? 'class="best-performance"' : ''}>
                    <td>${algo.name}</td>
                    <td>${algo.type}</td>
                    <td>${algo.result.comparisons}</td>
                    <td>${algo.result.swaps !== undefined ? algo.result.swaps : 'N/A'}</td>
                    <td>${isBest ? 'TERCEPAT 🏆' : ''}</td>
                </tr>`;
            });
            
            html += '</tbody></table>';
            
            html += '</div>';
            
            resultsDiv.innerHTML = html;
        }

        function clearResults() {
            document.getElementById('results').innerHTML = '';
        }

        // Auto-run analysis on page load
        window.onload = function() {
            runAnalysis();
        };
    </script>
</body>
</html>