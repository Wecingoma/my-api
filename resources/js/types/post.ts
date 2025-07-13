import { PageProps } from "vendor/laravel/breeze/stubs/inertia-react-ts/resources/js/types";
// import {PageProps} from "@/types"

export interface Author{
    id: number;
    name: string;


}

export interface Post{
    id: number;
    title: string;
    description: string
    image: string|null
    created_at: string
    author: Author
    is_liked: boolean
    like_count: number
    user_id: number
}


export interface PostFormData
{
    [key: string]: string|File|null
    title: string
    description: string
    image: File |null
}

export interface DashboardProps extends PageProps{
    userPost: Post[];
}

export interface CreatePosts extends PageProps{}


export interface EditPosts extends PageProps{
    post: Post
}
export interface ShowProps extends PageProps{
    post: Post
}

export interface Props{
    posts: Post[];
    ShowAuthor?: boolean
    canEdit?: boolean
    

}