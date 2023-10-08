<!-- Virtual keyboard -->
<div x-data="{ open: false }" class="w-1/2 lg:w-full m-0 p-0 h-8 md:h-10">
    <x-jet-button class="w-full bg-purple-700 h-8 md:h-10" x-on:click="open = ! open">
        <div class="flex">
            <x-clarity-keyboard-line class="w-6 h-6 " />
        </div>
        <span class="block ml-2 ">
            Keyboard
        </span>
    </x-jet-button>
    <div class="shadow-md absolute inset-x-0 bottom-0 bg-gradient-to-tr from-gray-800 to-slate-900 border-t border-gray-600 rounded-t-lg w-full flex justify-center" x-cloak x-show="open">
        <div class="w-11/12 sm:w-8/12 lg:w-1/2">
            <div class="pt-2 pb-1 px-2 flex justify-between">
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N1">1</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N2">2</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N3">3</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N4">4</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N5">5</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N6">6</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N7">7</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N8">8</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N9">9</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N0">0</button>
            </div>
            <div class="pb-1 px-2 flex justify-between">
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Q">Q</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="W">W</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="E">E</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="R">R</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="T">T</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Y">Y</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="U">U</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="I">I</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="O">O</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="P">P</button>
            </div>
            <div class="rounded-lg py-1 px-8 flex">
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="A">A</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="S">S</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="D">D</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="F">F</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="G">G</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="H">H</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="J">J</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="K">K</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="L">L</button>
            </div>
            <div class="rounded-lg py-1 px-14 flex">
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="Z">Z</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="X">X</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="C">C</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="V">V</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="B">B</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="N">N</button>
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="M">M</button>
            </div>
            <div class="rounded-lg pt-1 pb-2 px-14 flex">
                <button class="rounded bg-gray-600 active:bg-gray-800 shadow-lg m-1 p-1 w-full text-center" id="SPACE">SPACE</button>
            </div>
        </div>
    </div>

    <script>
        let N1 = document.getElementById("N1").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '1'
            }));
        });
        let N2 = document.getElementById("N2").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '2'
            }));
        });
        let N3 = document.getElementById("N3").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '3'
            }));
        });
        let N4 = document.getElementById("N4").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '4'
            }));
        });
        let N5 = document.getElementById("N5").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '5'
            }));
        });
        let N6 = document.getElementById("N6").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '6'
            }));
        });
        let N7 = document.getElementById("N7").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '7'
            }));
        });
        let N8 = document.getElementById("N8").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '8'
            }));
        });
        let N9 = document.getElementById("N9").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '9'
            }));
        });
        let N0 = document.getElementById("N0").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': '0'
            }));
        });
        let Q = document.getElementById("Q").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'q'
            }));
        });
        let W = document.getElementById("W").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'w'
            }));
        });
        let E = document.getElementById("E").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'e'
            }));
        });
        let R = document.getElementById("R").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'r'
            }));
        });
        let T = document.getElementById("T").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 't'
            }));
        });
        let Y = document.getElementById("Y").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'y'
            }));
        });
        let U = document.getElementById("U").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'u'
            }));
        });
        let I = document.getElementById("I").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'i'
            }));
        });
        let O = document.getElementById("O").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'o'
            }));
        });
        let P = document.getElementById("P").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'p'
            }));
        });
        let A = document.getElementById("A").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'a'
            }));
        });
        let S = document.getElementById("S").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 's'
            }));
        });
        let D = document.getElementById("D").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'd'
            }));
        });
        let F = document.getElementById("F").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'f'
            }));
        });
        let G = document.getElementById("G").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'g'
            }));
        });
        let H = document.getElementById("H").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'h'
            }));
        });
        let J = document.getElementById("J").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'j'
            }));
        });
        let K = document.getElementById("K").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'k'
            }));
        });
        let L = document.getElementById("L").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'l'
            }));
        });
        let Z = document.getElementById("Z").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'z'
            }));
        });
        let X = document.getElementById("X").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'x'
            }));
        });
        let C = document.getElementById("C").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'c'
            }));
        });
        let V = document.getElementById("V").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'v'
            }));
        });
        let B = document.getElementById("B").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'b'
            }));
        });
        let N = document.getElementById("N").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'n'
            }));
        });
        let M = document.getElementById("M").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'm'
            }));
        });
        let SPACE = document.getElementById("SPACE").addEventListener("click", () => {
            document.dispatchEvent(new KeyboardEvent('keydown', {
                'key': 'Space'
            }));
        });
    </script>
</div>
