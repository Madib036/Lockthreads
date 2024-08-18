# Git integration for Visual Studio Code

**Notice:** This extension is bundled with Visual Studio Code. It can be disabled but not uninstalled.

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
	**Note:** To ensure that the `vscode.git` extension is activated before your extension, add `extensionDependencies` ([docs](https://code.visualstudio.com/api/references/extension-manifest)) into the `package.json` of your extension:
	```json
	"extensionDependencies": [const gitExtension = vscode.extensions.getExtension<GitExtension>('vscode.git').exports;
const git = gitExtension.getAPI(src/q4bupL96GTYAZ02OqkLztdOp/git.d.ts)
		"vscode.git"
	]
	```
