# Design System Document: High-End Editorial Reading Experience

## 1. Overview & Creative North Star: "The Living Manuscript"
This design system is built to transform digital reading from a utility into a ritual. Our Creative North Star is **The Living Manuscript**—a philosophy that bridges the tactile, authoritative weight of a physical premium hardback with the fluid, ethereal possibilities of a digital interface.

Unlike generic "minimalist" systems that rely on flat containers and rigid grids, this system uses **intentional asymmetry** and **tonal layering** to create a sense of curation. We reject the "app" aesthetic in favor of an editorial experience where the UI recedes, and the content takes center stage as a masterpiece. The goal is to provide a sense of "quiet luxury" through generous white space, sophisticated warmth, and a rejection of traditional structural lines.

---

## 2. Colors: Tonal Atmosphere
The palette is rooted in warmth and high-legibility contrast. We avoid pure blacks and cold whites to reduce eye strain and evoke the feel of archival-quality paper.

### The "No-Line" Rule
**Explicit Instruction:** Designers are prohibited from using 1px solid borders for sectioning or containment. 
*   Boundaries must be defined solely through background color shifts. 
*   Use `surface-container-low` for large content areas and `surface-container-highest` for nested elements to create separation without the "boxed-in" feel of traditional UI.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers.
*   **Base:** `surface` (#fff8f6) is your canvas.
*   **Layer 1:** Use `surface-container-low` for secondary navigation sidebars.
*   **Layer 2:** Use `surface-container-highest` for floating immersive elements (like a reading settings panel).
*   **CTAs:** Main actions use `primary` (#a53600) to pull the eye with a vibrant, sophisticated warmth.

### Glass & Gradient Rule
To ensure the interface feels "high-end" rather than "standard," use semi-transparent surfaces for persistent navigation bars. Apply a `surface` color at 80% opacity with a `backdrop-filter: blur(20px)`. Main CTAs should feature a subtle linear gradient from `primary` to `primary_container` at a 135-degree angle to provide a "signature" polish.

---

## 3. Typography: The Editorial Voice
Typography is the cornerstone of this system. We use a dual-font strategy to separate the "Soul" (the story) from the "Machine" (the interface).

*   **The Serif (Newsreader / Crimson Text):** Reserved for Story Content. These fonts provide the classic manuscript feel. 
    *   **Body Text:** Must maintain a line-height of **1.8 to 2.0**. This "vertical air" is non-negotiable for a premium reading experience.
    *   **Display/Headline:** Use `display-lg` for chapter titles. Let the serifs be the visual hero.
*   **The Sans-Serif (Inter):** Reserved for Utility. Used for labels, buttons, and navigation. It provides a crisp, modern counterpoint to the organic serif text.

### Typographic Cadence
*   **Display Styles:** Tighten letter-spacing by -2% to give headlines a "custom-set" look.
*   **Body Styles:** Increase letter-spacing by +1% to +2% for long-form content to ensure maximum breathability.

---

## 4. Elevation & Depth
In this design system, depth is achieved through light and tone, never through heavy-handed shadows.

### The Layering Principle
Depth is created by "stacking" surface tiers. Place a `surface_container_lowest` card on a `surface_container_low` section to create a soft, natural lift. This mimics the way a sheet of heavy paper rests on a desk.

### Ambient Shadows
When a floating element (like a context menu) is required:
*   **Blur:** Minimum 24px.
*   **Opacity:** 4% to 6%.
*   **Color:** Use the `on_surface` (#261814) color rather than pure grey to ensure the shadow feels like it belongs to the warm environment.

### The "Ghost Border" Fallback
If a container requires a boundary for accessibility, use a **Ghost Border**. This is a 1px line using `outline_variant` at **15% opacity**. It should be felt, not seen.

---

## 5. Components: Refined Interaction

### Buttons
*   **Primary:** High-contrast `primary` fill with `on_primary` text. Use `rounded-full` (9999px) for a modern, tactile feel.
*   **Secondary:** No fill. Use a `surface_container_highest` background on hover.
*   **Tertiary:** Purely typographic using `label-md` in `inter`.

### Cards & Content Lists
**Forbid the use of divider lines.** 
*   Separate list items using `spacing-lg` (vertical white space).
*   In "Shelf" views, use subtle background shifts (`surface-container-low`) to define the hit area of a book card.

### Reading View (The Viewport)
The most critical component.
*   **Max Width:** 680px for optimal line length (CPL).
*   **Margins:** Generous, responsive margins that scale to "push" the text into the center of the user's focus.
*   **Progress Indicator:** A slim, 2px line in `primary` at the very top of the viewport, devoid of any container or shadow.

### Input Fields
*   **Style:** Minimalist. No background fill. Only a bottom border using `outline_variant` at 40% opacity.
*   **Focus State:** The bottom border transforms into a 2px `primary` line.

---

## 6. Do's and Don'ts

### Do
*   **Do** use the `primary_fixed` color for subtle highlights in "Edit" modes.
*   **Do** allow the background (`surface`) to bleed into the margins; whitespace is a luxury feature.
*   **Do** use `Newsreader` for all narrative elements, including quotes and footnotes.
*   **Do** use "Optical Sizing" if the font supports it to maintain elegance at small sizes.

### Don't
*   **Don't** use pure black for text. Use `on_surface` (#261814) to maintain the "ink-on-paper" softness.
*   **Don't** use standard Material Design "Drop Shadows." They are too aggressive for this editorial context.
*   **Don't** use 1px dividers to separate chapters; use a `display-sm` fleuron or a large spatial gap.
*   **Don't** crowd the interface. If you are unsure, add 16px of extra padding.

---

## 7. Accessibility & Motion
*   **Contrast:** Ensure all `on_surface` text meets WCAG AA standards against the `surface` background.
*   **Motion:** Interactions should be "weighted." Use a slow `cubic-bezier(0.4, 0, 0.2, 1)` for page transitions to mimic the deliberate act of turning a page in a physical book.