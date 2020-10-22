const items = [
    {
        "section_name": "Section 1",
        "section_items": [
            {
                "item_parent": "Level 1",
                "path": "/dashboard",
                "child": [
                    {
                        "title": "level 2",
                        "path": "/dashboard"
                    },
                ]
            },
            {
                "item_parent": "Level 1",
                "path": "/dashboard",
                "child": []
            },
        ]
    },
    {
        "section_name": "Section 2",
        "section_items": [
            {
                "item_parent": "Level 1",
                "path": "/account",
                "child": [
                    {
                        "title": "level 2",
                        "path": "/account"
                    },
                ]
            },
            {
                "item_parent": "Level 1",
                "path": "/account",
                "child": []
            },
            {
                "item_parent": "Level",
                "path": "/account",
                "child": [
                    {
                        "title": "level 2",
                        "path": "/account"
                    },
                ]
            },
        ]
    },
]

export default items
