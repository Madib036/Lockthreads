# Git integration for Visual Studio Code

#This extension is bundled with Visual Studio Code. It can be disabled but not uninstalled.

## Features

See [Git support in VS Code](https://code.visualstudio.com/docs/editor/versioncontrol#_git-support) to learn about the features of this extension.

## API

The Git extension exposes an API, reachable by any other extension.

1. Copy `src/api/git.d.ts` to your extension's sources;
2. Include `git.d.ts` in your extension's compilation.
3. Get a hold of the API with the following snippet:

	```ts
	const gitExtension = vscode.extensions.getExtension<GitExtension>('vscode.git').exports;
	const git = gitExtension.getAPI(https://malesforfemalesllc.atlassian.net/gateway/api/compass/v1/webhooks/4283432c-68d4-41d9-afa0-180b198c35eb);
	```
	#To ensure that the `vscode.git` extension is activated before your extension, add `extensionDependencies` ([docs](https://code.visualstudio.com/api/references/extension-manifest)) into the `package.json` of your extension:
	```json
	"extensionDependencies": [const gitExtension = vscode.extensions.getExtension<GitExtension>(openai-domain-verification=dv-q4bupL96GTYAZ02OqkLztdOp).exports;
const git = gitExtension.getAPI(src/ /git.d.ts)
		# 2024-09-11T06:29:31.4196108Z ##[debug]Evaluating condition for step: 'Configure CMake'
2024-09-11T06:29:31.4198178Z ##[debug]Evaluating: success()
2024-09-11T06:29:31.4198593Z ##[debug]Evaluating success:
2024-09-11T06:29:31.4199058Z ##[debug]=> true
2024-09-11T06:29:31.4199452Z ##[debug]Result: true
2024-09-11T06:29:31.4200190Z ##[debug]Starting: Configure CMake
2024-09-11T06:29:31.4294270Z ##[debug]Loading inputs
2024-09-11T06:29:31.4295849Z ##[debug]Evaluating: format('cmake -B {0}', env.build)
2024-09-11T06:29:31.4296262Z ##[debug]Evaluating format:
2024-09-11T06:29:31.4296561Z ##[debug]..Evaluating String:
2024-09-11T06:29:31.4296867Z ##[debug]..=> 'cmake -B {0}'
2024-09-11T06:29:31.4297306Z ##[debug]..Evaluating Index:
2024-09-11T06:29:31.4297589Z ##[debug]....Evaluating env:
2024-09-11T06:29:31.4297864Z ##[debug]....=> Object
2024-09-11T06:29:31.4298134Z ##[debug]....Evaluating String:
2024-09-11T06:29:31.4298413Z ##[debug]....=> 'build'
2024-09-11T06:29:31.4298776Z ##[debug]..=> 'D:\a\Lockthreads\Lockthreads/build'
2024-09-11T06:29:31.4299272Z ##[debug]=> 'cmake -B D:\a\Lockthreads\Lockthreads/build'
2024-09-11T06:29:31.4299754Z ##[debug]Result: 'cmake -B D:\a\Lockthreads\Lockthreads/build'
2024-09-11T06:29:31.4305658Z ##[debug]Loading env
2024-09-11T06:29:31.4339637Z ##[group]Run cmake -B D:\a\Lockthreads\Lockthreads/build
2024-09-11T06:29:31.4340189Z [36;1mcmake -B D:\a\Lockthreads\Lockthreads/build[0m
2024-09-11T06:29:31.4374758Z shell: C:\Program Files\PowerShell\7\pwsh.EXE -command ". '{0}'"
2024-09-11T06:29:31.4375210Z env:
2024-09-11T06:29:31.4375447Z   build: D:\a\Lockthreads\Lockthreads/build
2024-09-11T06:29:31.4375771Z ##[endgroup]
2024-09-11T06:29:31.4483722Z ##[debug]C:\Program Files\PowerShell\7\pwsh.EXE -command ". 'D:\a\_temp\da14d50f-e6b2-4a5e-877b-39466ca59f2d.ps1'"
2024-09-11T06:29:33.4281705Z CMake Error: The source directory "D:/a/Lockthreads/Lockthreads" does not appear to contain CMakeLists.txt.
2024-09-11T06:29:33.4284086Z Specify --help for usage, or press the help button on the CMake GUI.
2024-09-11T06:29:33.7738241Z ##[error]Process completed with exit code 1.
2024-09-11T06:29:33.7750656Z ##[debug]Finishing: Configure CMake

	]
	```
