# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## About This Package

This is **Livewire Wizard**, a Laravel package that provides multi-step form components built on Livewire. It creates wizard-style forms with step navigation, validation, and state management.

## Development Commands

Since this is a Laravel package, development typically involves:
- `composer install` - Install dependencies
- `composer test` - Run tests (if test suite exists)
- `composer analyze` - Static analysis (if configured)

For testing in a Laravel application:
- Link package with `composer require skuads/livewire-wizard-beta:@dev`
- Publish views: `php artisan vendor:publish --tag=livewire-wizard-views`

## Architecture Overview

### Core Components

- **`WizardComponent`** - Abstract base class extending Livewire Component that implements wizard functionality
- **`Step`** - Abstract base class for individual wizard steps  
- **Traits in `Concerns/`** - Modular functionality:
  - `HasSteps` - Step navigation and validation logic
  - `HasState` - Form state management across steps
  - `HasHooks` - Lifecycle hook system for extensibility
  - `BelongsToLivewire` - Links steps to parent wizard

### Key Patterns

**Trait-Based Architecture**: Functionality is separated into focused traits rather than deep inheritance chains.

**Hook-Driven Extension**: The package uses lifecycle hooks (`beforeMount`, `onStepIn`, etc.) for customization rather than requiring inheritance.

**Stateful Design**: A centralized `$state` array is shared across all steps and persists throughout the wizard lifecycle.

**Step Validation Gates**: Each step can define validation rules that must pass before progressing to the next step.

**URL-Based Navigation**: Steps are tracked in the URL using Livewire's `#[Url]` attribute for bookmarkable wizard states.

### Implementation Requirements

When creating wizards:
1. Extend `WizardComponent` and define `$steps` array with step classes
2. Each step must extend `Step` class and implement required methods
3. State management uses `$this->mergeState()`, `$this->setState()` methods
4. Validation rules defined in step's `rules()` method
5. Views should use provided Blade templates or publish and customize them

### Directory Structure

- `src/Components/` - Core component classes
- `src/Concerns/` - Reusable traits
- `src/Contracts/` - Interface definitions
- `resources/views/` - Blade templates for wizard UI
- `config/` - Package configuration (currently minimal)

The package is designed for high extensibility through composition over inheritance, making it suitable for complex multi-step form scenarios while maintaining clean separation of concerns.